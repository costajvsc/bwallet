@extends('layout/_layout')

@section('title') Payments @endsection

@section('body')
    <h1>Payments</h1>

    <form action="/payment" method="post">
        @csrf
        <div class="row">
            <div class="col-xl-6 col-lg-4 col-md-12 col-sm-12 mb-3">
                <label for="bank" class="form-label">Bank</label>
                <input type="text" class="form-control" id="bank" name="bank" placeholder="Nu Pagamentos" minlength="3" maxlength="150" required>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-12 col-sm-12 mb-3">
                <label for="billing_day" class="form-label">Billing Day</label>
                <input type="number" class="form-control" id="billing_day" name="billing_day" min="1" max="31">
            </div>
            <div class="col-xl-3 col-lg-4 col-md-12 col-sm-12 d-flex align-items-center">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="is_credit" name="is_credit">
                    <label class="form-check-label" for="is_credit">Credit method?</label>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary"><i class="fas fa-money-bill-wave"></i> Create payment</button>
        </div>
    </form>

    @include('payment/components/list')
@endsection