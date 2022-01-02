@extends('layout/_layout')

@section('title') Edit {{$transaction->transaction}} Transaction @endsection

@section('body')
    <h3 class="mt-2 mb-4"><i class="fas fa-file-invoice-dollar"></i> Edit #{{$transaction->id_transaction}} Transaction</h3>

    <form action="/transaction/update" method="post">
        @csrf
        @method('PATCH')
        <input type="hidden" name="id_transaction" value="{{$transaction->id_transaction}}">
        <div class="row mt-2 mb-4">
            <div class="col-6">
                <label for="transaction" class="form-label">Transaction</label>
                <input type="text" class="form-control" id="transaction" name="transaction" minlength="3" maxlength="50" value="{{$transaction->transaction}}" required>
            </div>
            <div class="col-6">
                <label for="amount" class="form-label">Amount</label>
                <input type="number" class="form-control" id="amount" name="amount" min="0.01" maxlength="999999.99" step=".01" value="{{$transaction->amount}}" required>
            </div>
        </div>
        <div class="row mt-2 mb-4">
            <div class="col-6">
                <label for="occurrence_at" class="form-label">Date</label>
                <input type="datetime-local" class="form-control" id="occurrence_at" name="occurrence_at" minlength="3" maxlength="50" required>
            </div>
            <div class="col-6">
                <label for="accounting_entry" class="form-label">Accounting entry</label>
                <select class="form-select" id="accounting_entry" name="accounting_entry" required>
                    <option value="1" {{ $transaction->accounting_entry == 1 ? 'selected' : ''}}>Credit (↓)</option>
                    <option value="-1" {{ $transaction->accounting_entry == -1 ? 'selected' : ''}}>Debit (↑)</option>
                </select>
            </div>
        </div>

        <hr/>

        <div class="mb-4">
            <div class="row">
                <div class="col-4">
                    <label for="category" class="form-label">Category</label>
                    <select class="form-select" id="category" name="id_category">
                        <option value="0" selected>Selecionar...</option>
                        @foreach(\App\Services\LoadDataService::getCategories() as $c)
                            <option value="{{$c->id_category}}" {{$c->id_category == $transaction->id_category ? 'selected' : ''}}>{{$c->title}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-4">
                    <label for="payment" class="form-label">Payment</label>
                    <select class="form-select" id="payment" name="id_payment">
                        <option value="0" selected>Selecionar...</option>
                        @foreach(\App\Services\LoadDataService::getPayments() as $p)
                            <option value="{{$p->id_payment}}" {{$p->id_payment == $transaction->id_payment ? 'selected' : ''}}>{{$p->bank}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-4">
                    <label for="piggy_bank" class="form-label">Piggy bank</label>
                    <select class="form-select" id="piggy_bank" name="id_piggy_bank">
                        <option value="0" selected>Selecionar...</option>
                        @foreach(\App\Services\LoadDataService::getPiggiesBank() as $p)
                            <option value="{{$p->id_piggy_bank}}" {{$p->id_piggy_bank == $transaction->id_piggy_bank ? 'selected' : ''}}>{{$p->title}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-end mt-2">
            <a href="/transaction" class="btn btn-outline-secondary me-2"><i class="fas fa-list"></i> List of transactions</a>
            <button type="submit" class="btn btn-warning"><i class="fas fa-money-bill-wave"></i> Update transaction</button>
        </div>
    </form>

    @include('transaction/components/list')
@endsection
@section('scripts')
    <script>
        var occurrence_at = new Date('{{$transaction->occurrence_at}}')
        console.log(document.getElementById('occurrence_at'));
        document.getElementById('occurrence_at').value = occurrence_at.toISOString().slice(0,16)
    </script>
@endsection
