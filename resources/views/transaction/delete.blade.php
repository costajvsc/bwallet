@extends('layout/_layout')

@section('title') Delete transaction {{$transaction->transaction}} @endsection

@section('body')
    <div class="mt-2 mb-2">
        <h3>Delete transaction #{{$transaction->id_transaction}}</h3>
        <h5>Do you want delete this transaction {{$transaction->transaction}}? <span class="text-danger">All these data will be lose</span></h5>
        <ul>
            <li>
                <p class="fw-bold">Transaction: <span class="fw-light">{{$transaction->transaction}}</span></p>
            </li>
            <li>
                <p class="fw-bold">Amount: <span class="fw-light">R$ {{$transaction->amount}}</span></p>
            </li>
            <li>
                <p class="fw-bold">Accounting entry: <span class="fw-light">{{$transaction->accounting_entry == 1 ? 'Debit' : 'Credit'}}</span></p>
            </li>
            <li>
                <p class="fw-bold">Occurrence at: <span class="fw-light">{{date_format(new DateTime($transaction->occurrence_at), 'd/m/Y')}}</span></p>
            </li>
            <hr />
            <li>
                <p class="fw-bold">Category: <span class="fw-light">{{$transaction->category_title}}</span></p>
            </li>
            <li>
                <p class="fw-bold">Payment: <span class="fw-light">{{$transaction->bank}}</span></p>
            </li>
            <li>
                <p class="fw-bold">Piggy Bank: <span class="fw-light">{{$transaction->piggy_bank_title}}</span></p>
            </li>
        </ul>

        <form action="/transaction/destroy" method="post">
            @csrf
            @method('DELETE')
            <input type="hidden" name="id_transaction" value="{{$transaction->id_transaction}}">
            <div class="d-flex justify-content-end">
                <a href="/transaction" class="btn btn-secondary me-2"><i class="fas fa-list"></i> List of transactions</a>
                <button type="submit" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i> Delete transaction</button>
            </div>
        </form>
    </div>
    @include('transaction/components/list')
@endsection
