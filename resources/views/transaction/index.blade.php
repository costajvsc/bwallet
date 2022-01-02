@extends('layout/_layout')

@section('title') Transactions @endsection

@section('body')
    <div class="d-flex justify-content-between mt-2 mb-4">
        <h3 class="mt-2 mb-4"><i class="fas fa-file-invoice-dollar"></i> Transactions</h3>
        <div class="d-flex flex-column align-self-center">
            <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#create-transaction">
                <i class="fas fa-cash-register"></i> Create a new transation
            </button>
        </div>
    </div>
    @include('transaction/components/list')
@endsection
<div></div>
@include('transaction/components/modal')
