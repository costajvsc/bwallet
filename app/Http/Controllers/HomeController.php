<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        return view('index');
    }

    private function getDefaultFilter()
    {
        return date('Y').'-'.date('m');
    }

    private function sliptFilter(string $filter = null)
    {
        return $filter ? explode('-',$filter) : explode('-', $this->getDefaultFilter());
    }

    private function getTransactionsByFilter(string $filter = null)
    {
        $filter = $this->sliptFilter($filter);
        $mouth = $filter[1];
        $year = $filter[0];

        $transactions = DB::table('transactions')
            ->leftJoin('categories', 'transactions.id_category', '=', 'categories.id_category')
            ->select('transactions.*', 'categories.*')
            ->where([
                ['transactions.id_user', '=', Auth::user()->id_user],
                ['transactions.deleted', '=', false]
            ])
            ->whereMonth('occurrence_at', $mouth)
            ->whereYear('occurrence_at', $year)
            ->get();

        return $transactions;
    }

    private function getPiggiesBankStatistics()
    {
        $piggies_bank = DB::table('piggies_bank')
            ->leftJoin('transactions', 'transactions.id_piggy_bank', 'piggies_bank.id_piggy_bank')
            ->select('piggies_bank.*', DB::raw('SUM(transactions.amount) as total'))
            ->where([
                ['transactions.id_user', '=', Auth::user()->id_user],
                ['transactions.deleted', '=', false],
                ['piggies_bank.id_user', '=', Auth::user()->id_user],
                ['piggies_bank.deleted', '=', false],
            ])
            ->groupBy('piggies_bank.title')
            ->get();

        return $piggies_bank;
    }

    private function getCategoriesStatistics(string $filter = null, int $accounting_entry = -1)
    {
        $filter = $this->sliptFilter($filter);
        $mouth = $filter[1];
        $year = $filter[0];

        $categories = DB::table('categories')
            ->join('transactions', 'transactions.id_category', 'categories.id_category')
            ->select('categories.*', DB::raw('SUM(transactions.amount) as total'))
            ->where([
                ['transactions.id_user', '=', Auth::user()->id_user],
                ['transactions.deleted', '=', false],
                ['categories.id_user', '=', Auth::user()->id_user],
                ['categories.deleted', '=', false],
                ['transactions.accounting_entry', '=', $accounting_entry]
            ])
            ->whereMonth('transactions.occurrence_at', $mouth)
            ->whereYear('transactions.occurrence_at', $year)
            ->groupBy('categories.title')
            ->get();

        return $categories;
    }

    private function getPaymentsStatistics(string $filter = null, int $accounting_entry = -1)
    {
        $filter = $this->sliptFilter($filter);
        $mouth = $filter[1];
        $year = $filter[0];

        $payments = DB::table('payments')
            ->leftJoin('transactions', 'transactions.id_payment', 'payments.id_payment')
            ->select('payments.*', DB::raw('SUM(transactions.amount) as total'))
            ->where([
                ['transactions.id_user', '=', Auth::user()->id_user],
                ['transactions.deleted', '=', false],
                ['payments.id_user', '=', Auth::user()->id_user],
                ['payments.deleted', '=', false],
                ['transactions.accounting_entry', '=', $accounting_entry]
            ])
            ->whereMonth('transactions.occurrence_at', $mouth)
            ->whereYear('transactions.occurrence_at', $year)
            ->groupBy('payments.bank')
            ->get();

        return $payments;
    }

    private function getResume($transactions)
    {
        $resume = [];
        $resume['income'] = 0.0;
        $resume['outcome'] = 0.0;
        $resume['balance'] = 0.0;

        foreach ($transactions as $transaction) {
            $transaction->accounting_entry == 1 ?
                $resume['income'] += $transaction->amount
                : $resume['outcome'] += $transaction->amount;
        }

        $resume['balance'] = $resume['income'] -  $resume['outcome'];

        return $resume;
    }

    public function dashboard(Request $request)
    {
        $filter = $request->filter;
        $transactions = $this->getTransactionsByFilter($filter);
        $resume = $this->getResume($transactions);

        $piggies_bank = $this->getPiggiesBankStatistics();
        $outcome_categories = $this->getCategoriesStatistics($filter, -1);
        $outcome_payments = $this->getPaymentsStatistics($filter, -1);
        $income_categories = $this->getCategoriesStatistics($filter, 1);
        $income_payments = $this->getPaymentsStatistics($filter, 1);

        return view('dashboard',[
            'transactions' => $transactions,
            'income' => $resume['income'],
            'outcome' => $resume['outcome'],
            'balance' => $resume['balance'],
            'piggies_bank' => $piggies_bank,
            'outcome_categories' => $outcome_categories,
            'outcome_payments' => $outcome_payments,
            'income_categories' => $income_categories,
            'income_payments' => $income_payments
        ]);
    }
}
