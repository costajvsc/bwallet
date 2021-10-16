@extends('_layout')
<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12"></div>

@section('body')
<h1>Hello world</h1>

<div class="row">
    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
        <h3>Registre suas finanças</h3>
        <p>Com o <span>bwallet</span> você começa a controlar suas finanças de uma maneira simples e prática.</p>
    </div>
    <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12">
        <form method="POST" action="/registry">
            @csrf
            <div class="mb-3">
                <label for="first-name" class="form-label">Seu nome</label>
                <input type="text" class="form-control" id="first-name" name="first_name" placeholder="Gabriella" required>
            </div>
            <div class="mb-3">
                <label for="last-name" class="form-label">Seu nome</label>
                <input type="text" class="form-control" id="last-name" name="last_name" placeholder="Vitoria" required>
            </div>

            <div class="mb-3">
                <label for="first-name" class="form-label">Email</label>
                <input type="email" class="form-control" id="first-name" name="email" placeholder="gabriela.vitoria@dwallet.com" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Senha</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="••••••••" required>
            </div>

            <div class="mb-3">
                <label for="password-confirm" class="form-label">Confirmar senha</label>
                <input type="password" class="form-control" id="password-confirm" name="password_confirm" placeholder="••••••••">
            </div>

            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>


@endsection
