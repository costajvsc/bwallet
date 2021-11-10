@extends('layout/_layout')

@section('title') Edit payment {{$payment->bank}} @endsection

@section('body')
    <h3>Edit payment #{{$payment->id_payment}}</h3>
    <form action="/payment/update" method="post">
        @csrf
        @method('PATCH')
        <input type="hidden" name="id_payment" value="{{$payment->id_payment}}">
        <div class="row">
            <div class="col-xl-6 col-lg-4 col-md-12 col-sm-12 mb-3">
                <label for="bank" class="form-label">Bank</label>
                <input type="text" class="form-control" id="bank" name="bank" value="{{$payment->bank}}" minlength="3" maxlength="150" required>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-12 col-sm-12 mb-3">
                <label for="billing_day" class="form-label">Billing Day</label>
                <input type="number" class="form-control" id="billing_day" name="billing_day" min="1" max="31" value="{{$payment->billing_day}}">
            </div>
            <div class="col-xl-3 col-lg-4 col-md-12 col-sm-12">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="is_credit" name="is_credit" {{$payment->is_credit ? 'checked' : ''}}>
                    <label class="form-check-label" for="is_credit">Credit method?</label>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-end">
            <a href="/payment" class="btn btn-secondary me-2"><i class="fas fa-list"></i> List of payments</a>
            <button type="submit" class="btn btn-primary"><i class="fas fa-money-bill-wave"></i> Update payment</button>
        </div>
    </form>

    @include('payment/components/list')
@endsection