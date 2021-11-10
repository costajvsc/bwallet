@extends('layout/_layout')

@section('title') Dashboard @endsection

@section('body')
    <ul class="nav justify-content-end">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Dashboard</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/payment">Payment</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/category">Categories</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/piggy-bank">Piggies bank</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-danger" href="/logout">Logout</a>
        </li>
    </ul>   
    <h1>Hello world</h1>
    <p>Bem vindo, {{Auth::user()->first_name}}</p>
@endsection
