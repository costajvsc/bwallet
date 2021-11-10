@extends('layout/_layout')

@section('title') Categories @endsection

@section('body')
    <h1>Categories</h1>

    <form action="/category" method="post">
        @csrf
        <div class="row">
            <div class="col-xl-6 col-lg-4 col-md-12 col-sm-12 mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Gas pump" minlength="3" maxlength="50" required>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-12 col-sm-12">
                <label for="icon" class="form-label">Icon</label>
                <input type="text" class="form-control" id="icon" name="icon" placeholder="Gas pump">
            </div>
            <div class="col-xl-3 col-lg-4 col-md-12 col-sm-12 mb-3">
                <label for="color" class="form-label">Color</label>
                <input type="color" class="form-control" id="color" name="color">
            </div>
        </div>
        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Create category</button>
        </div>
    </form>

    @include('category/components/list')
@endsection