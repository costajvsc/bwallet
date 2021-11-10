<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    private function getPayments()
    {
        return Payment::where([
            ['id_user', Auth::user()->id_user],
            ['deleted', false]
        ])->get();
    }

    public function findPayment($id)
    {
        return Payment::where([
            ['id_user', '=', Auth::user()->id_user],
            ['id_payment', '=', $id],
            ['deleted', false]
        ])->firstOrFail();
    }

    private function findPaymentWithList($id)
    {
        return [
            'payment' => $this->findPayment($id),
            'payments' => $this->getPayments()
        ];
    }
    public function index()
    {
        return view('payment.index', [
            'payments' => $this->getPayments()
        ]);
    }

    public function store(Request $request) 
    {
        $data = $request->all();
        $data['id_user'] = Auth::user()->id_user;
        $data['is_credit'] = $request->has('is_credit');

        if(!Payment::create($data))
            return back()->withErrors('An error ocurred while created a new payment '.$data['bank'].'.');

        return back()->with('success', 'Your payment '.$data['bank'].' was created with success.');
    }

    public function edit(Request $request)
    {
        return view('payment.edit', $this->findPaymentWithList($request->id));
    }

    public function update(Request $request)
    {
        $data = $request->all();
        $data['is_credit'] = $request->has('is_credit');
        $payment = $this->findPayment($request->id_payment);

        $payment->fill($data);
        
        if(!$payment->save())
            return back()->withErrors('An error ocurred while updated the payment '.$payment['bank'].'.');

        return redirect('/payment')->with('warning', 'Your payment '.$payment['bank'].' was updated with success.');
    }

    public function delete(Request $request)
    {
        return view('payment.delete', $this->findPaymentWithList($request->id));
    }

    public function destroy(Request $request)
    {
        $payment = $this->findPayment($request->id_payment);

        $payment->deleted = true;
        $payment->deleted_at = date("Y-m-d H:i:s");

        if(!$payment->save())
            return redirect('/payment')->withErrors('An error ocurred while deleted the payment '.$payment['bank'].'.');

        return redirect('/payment')->with('warning', 'Your payment '.$payment['bank'].' was deleted with success.');
    }

}
