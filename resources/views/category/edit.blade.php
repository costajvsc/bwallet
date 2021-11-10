@extends('layout/_layout')

@section('title') Edit category {{$category->title}} @endsection

@section('body')
    <h3>Edit category #{{$category->id_category}}</h3>
    <form action="/category/update" method="post">
        @csrf
        @method('PATCH')
        <input type="hidden" name="id_category" value="{{$category->id_category}}">
        <div class="row">
            <div class="col-xl-6 col-lg-4 col-md-12 col-sm-12 mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{$category->title}}" minlength="3" maxlength="50" required>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-12 col-sm-12">
                <label for="icon" class="form-label">Icon</label>
                <input type="text" class="form-control" id="icon" name="icon" value="{{$category->icon}}">
            </div>
            <div class="col-xl-3 col-lg-4 col-md-12 col-sm-12 mb-3">
                <label for="color" class="form-label">Color</label>
                <input type="color" class="form-control" id="color" name="color" value="{{$category->color}}">
            </div>
        </div>
        <div class="d-flex justify-content-end">
            <a href="/category" class="btn btn-secondary me-2"><i class="fas fa-list"></i> List of categories</a>
            <button type="submit" class="btn btn-outline-warning"><i class="fas fa-save"></i> Update category</button>
        </div>
    </form>

    @include('category/components/list')
@endsection