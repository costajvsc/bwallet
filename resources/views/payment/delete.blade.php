@extends('layout/_layout')

@section('title') Delete payment {{$payment->title}} @endsection

@section('body')
    <div class="mt-2 mb-2">
        <h3>Delete payment #{{$payment->id_payment}}</h3>
        <h5>Do you want delete this payment {{$payment->bank}}? <span class="text-danger">All these data will be lose</span></h5>
        <ul>
            <li>
                <p class="fw-bold">Bank: <span class="fw-light">{{$payment->bank}}</span></p>
            </li>
            <li>
                <p class="fw-bold">Credit: <span class="fw-light">{{$payment->is_credit ? 'True' : 'False'}}</span></p>
            </li>
            <li>
                <p class="fw-bold">Billing day: <span class="fw-light">{{$payment->billing_day}}</span></p>    
            </li>
        </ul>

        <form action="/payment/destroy" method="post">
            @csrf
            @method('DELETE')
            <input type="hidden" name="id_payment" value="{{$payment->id_payment}}">
            <div class="d-flex justify-content-end">
                <a href="/payment" class="btn btn-secondary me-2"><i class="fas fa-list"></i> List of payment</a>
                <button type="submit" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i> Delete payment</button>
            </div>
        </form>
    </div>
    @include('payment/components/list')
@endsection