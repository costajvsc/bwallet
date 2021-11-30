@extends('layout/_layout')

@section('title') Transactions @endsection

@section('body')
    <h1>Transactions</h1>

    <div class="d-flex justify-content-end">
        <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#create-transaction">
            <i class="fas fa-cash-register"></i> Create a new transation
        </button>
    </div>
    @include('transaction/components/list')
@endsection

@include('transaction/components/modal')