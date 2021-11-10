@extends('layout/_layout')

@section('title') Edit piggy bank {{$piggy_bank->title}} @endsection

@section('body')
    <h1>Piggies bank</h1>

    <form action="/piggy-bank/update" method="post">
        @csrf
        @method('PATCH')
        <input type="hidden" name="id_piggy_bank" value="{{$piggy_bank->id_piggy_bank}}">
        <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{$piggy_bank->title}}">
            </div>
            <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12">
                <label for="milestone" class="form-label">Milestone</label>
                <input type="date" class="form-control" id="milestone" name="milestone" value="{{$piggy_bank->milestore}}">
            </div>
            <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12">
                <label for="icon" class="form-label">Icon</label>
                <input type="text" class="form-control" id="icon" name="icon" value="{{$piggy_bank->icon}}">
            </div>
            <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12">
                <label for="amount" class="form-label">Amount</label>
                <input type="number" min="0" step=".01" class="form-control" id="amount" name="amount" value="{{$piggy_bank->amount}}">
            </div>
            <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 mb-3">
                <label for="color" class="form-label">Color</label>
                <input type="color" class="form-control" id="color" name="color" value="{{$piggy_bank->color}}">
            </div>
        </div>
        <div class="d-flex justify-content-end">
            <a href="/piggy-bank" class="btn btn-secondary me-2"><i class="fas fa-piggy-bank"></i> List of piggies banks</a>
            <button type="submit" class="btn btn-outline-warning"><i class="fas fa-piggy-bank"></i> Update piggy bank</button>
        </div>
    </form>

    @include('piggy-bank/components/list')
@endsection