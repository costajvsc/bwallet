<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    private function getTransactions()
    {
        return DB::table('transactions')
                    ->leftJoin('categories', 'transactions.id_category', '=', 'categories.id_category')
                    ->leftJoin('payments', 'transactions.id_payment', '=', 'payments.id_payment')
                    ->leftJoin('piggies_bank', 'transactions.id_piggy_bank', '=', 'piggies_bank.id_piggy_bank')
                    ->select('transactions.*', 'categories.title as category_title', 'payments.bank', 'piggies_bank.title as piggy_bank_title')
                    ->where([
                        ['transactions.id_user', Auth::user()->id_user],
                        ['transactions.deleted', false]
                    ])
                    ->orderBy('occurrence_at', 'desc')
                ->paginate(15);
    }

    private function findTransaction($id)
    {
        return DB::table('transactions')
                    ->leftJoin('categories', 'transactions.id_category', '=', 'categories.id_category')
                    ->leftJoin('payments', 'transactions.id_payment', '=', 'payments.id_payment')
                    ->leftJoin('piggies_bank', 'transactions.id_piggy_bank', '=', 'piggies_bank.id_piggy_bank')
                    ->select('transactions.*', 'categories.title as category_title', 'payments.bank', 'piggies_bank.title as piggy_bank_title')
                    ->where([
                        ['transactions.id_user', Auth::user()->id_user],
                        ['transactions.id_transaction', '=', $id],
                        ['transactions.deleted', false]
                    ])
                ->first();
    }

    private function getTransaction($id)
    {
        return Transaction::where([
            ['id_user', '=', Auth::user()->id_user],
            ['id_transaction', '=', $id],
            ['deleted', false]
        ])->firstOrFail();
    }


    private function findTransactionWithList($id)
    {
        return [
            'transaction' => $this->findTransaction($id),
            'transactions' => $this->getTransactions()
        ];
    }
    public function index()
    {
        return view('transaction.index', [
            'transactions' => $this->getTransactions()
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['id_user'] = Auth::user()->id_user;

        if(!Transaction::create($data))
            return back()->withErrors('An error ocurred while created a new transaction '.$data['transaction'].'.');

        return back()->with('success', 'Your transaction '.$data['transaction'].' was created with success.');
    }

    public function edit(Request $request)
    {
        return view('transaction.edit', $this->findTransactionWithList($request->id));
    }

    public function update(Request $request)
    {
        $data = $request->all();
        $transaction = $this->getTransaction($request->id_transaction);

        $transaction->fill($data);

        if(!$transaction->save())
            return back()->withErrors('An error ocurred while updated the transaction '.$transaction['transaction'].'.');

        return redirect('/transaction')->with('warning', 'Your transaction '.$transaction['transaction'].' was updated with success.');
    }

    public function delete(Request $request)
    {
        return view('transaction.delete', $this->findTransactionWithList($request->id));
    }

    public function destroy(Request $request)
    {
        $transaction = $this->getTransaction($request->id_transaction);

        $transaction->deleted = true;
        $transaction->deleted_at = date("Y-m-d H:i:s");

        if(!$transaction->save())
            return redirect('/transaction')->withErrors('An error ocurred while deleted the transaction '.$transaction['transaction'].'.');

        return redirect('/transaction')->with('warning', 'Your transaction '.$transaction['transaction'].' was deleted with success.');
    }

}
