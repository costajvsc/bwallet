@extends('layout/_layout')

@section('title') Delete {{$category->title}} Category @endsection

@section('body')
    <div class="mt-2 mb-2">
        <h3 class="mt-2 mb-4"><i class="fas fa-list"></i> Delete category #{{$category->id_category}}</h3>

        <h5>Do you want delete this category {{$category->title}}? <span class="text-danger">All these data will be lose</span></h5>
        <ul>
            <li>
                <p class="fw-bold">Title: <span class="fw-light">{{$category->title}}</span></p>
            </li>
            <li>
                <p class="fw-bold">Color: <span class="fw-light">{{$category->color}}</span></p>
            </li>
            <li>
                <p class="fw-bold">Icon: <span class="fw-light">({{$category->icon}})</span></p>
            </li>
            <li>
                <p class="fw-bold">Demo: <span class="fw-light"><i class="fas fa-{{$category->icon}}" style="color: {{$category->color}};"></i> </span></p>
            </li>
        </ul>

        <form action="/category/destroy" method="post">
            @csrf
            @method('DELETE')
            <input type="hidden" name="id_category" value="{{$category->id_category}}">
            <div class="d-flex justify-content-end">
                <a href="/category" class="btn btn-secondary me-2"><i class="fas fa-list"></i> List of category</a>
                <button type="submit" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i> Delete category</button>
            </div>
        </form>
    </div>
    @include('category/components/list')
@endsection
<div></div>
