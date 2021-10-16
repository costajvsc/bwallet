@extends('_layout')


@section('body')

    <form method="POST" class="form-login" action="/login">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="user@bwallet.com" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="••••••••" required>
        </div>

        <button class="btn btn-primary mb-3" type="submit">
            Logar
        </button>

        @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <span class="d-block">{{ $error }}</span>
                @endforeach
            </div>
        @endif
    </form>
@endsection
