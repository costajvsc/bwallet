@extends('layout/_layout')

@section('title') Piggies Bank @endsection

@section('body')
    <h1>Piggies bank</h1>

    <form action="/piggy-bank" method="post">
        @csrf
        <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Travel to California" minlength="3" maxlength="50" required>
            </div>
            <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12">
                <label for="milestone" class="form-label">Milestone</label>
                <input type="date" class="form-control" id="milestone" name="milestone" placeholder="Travel to California">
            </div>
            <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12">
                <label for="icon" class="form-label">Icon</label>
                <input type="text" class="form-control" id="icon" name="icon" placeholder="Travel to California">
            </div>
            <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12">
                <label for="amount" class="form-label">Amount</label>
                <input type="number" min="0" step=".01" class="form-control" id="amount" name="amount" min="0.01" step=".01" placeholder="Travel to California">
            </div>
            <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 mb-3">
                <label for="color" class="form-label">Color</label>
                <input type="color" class="form-control" id="color" name="color" placeholder="Travel to California">
            </div>
        </div>
        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary"> <i class="fas fa-piggy-bank"></i> Create piggy bank</button>
        </div>
    </form>

    @include('piggy-bank/components/list')
@endsection