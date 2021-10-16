@extends('_layout')


@section('body')
    <h1>Hello world</h1>
    <p>Bem vindo, {{Auth::user()->first_name}}</p>
    <a href="/logout"> <i class="fas fa-sign-out-alt"></i> Sair</a>
@endsection
