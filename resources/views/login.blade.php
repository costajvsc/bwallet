@extends('layout/_content')
@section('title') Welcome to login @endsection
@section('styles')
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }
        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    <link href="{{asset('css/singin.css')}}" rel="stylesheet">
@endsection

@section('body')
    <div class="container">
        <form class="form-signin" method="POST" action="/login">
            <h1>Welcome to <span class="text-primary">Bwallet</span>.</h1>
            <p class="fw-light">Entry with your credentials to see your <span class="text-secondary"><i class="fas fa-wallet"></i></span> wallet.</p>
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="user@bwallet.com" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="••••••••" required>
            </div>
            <div class="d-flex justify-content-end">
                <button class="btn btn-primary mb-3" type="submit">
                    <i class="fas fa-sign-in-alt"></i> Login
                </button>
            </div>
            @include('layout.components.__message')
        </form>
    </div>
@endsection
