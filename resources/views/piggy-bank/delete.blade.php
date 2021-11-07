@extends('_layout')

@section('title') Delete piggy bank {{$piggy_bank->title}} @endsection

@section('body')
    <div class="mt-2 mb-2">
        <h3>Delete piggy bank #{{$piggy_bank->id_piggy_bank}}</h3>
        <h5>Do you want delete this piggy bank {{$piggy_bank->title}}? <span class="text-danger">All these data will be lose</span></h5>
        <ul>
            <li>
                <p class="fw-bold">Title: <span class="fw-light">{{$piggy_bank->title}}</span></p>
            </li>
            <li>
                <p class="fw-bold">Amount: <span class="fw-light">R$ {{$piggy_bank->amount}}</span></p>
            </li>
            <li>
                <p class="fw-bold">Millerstone: <span class="fw-light">{{date_format(new DateTime($piggy_bank->milestone), 'd/m/Y')}}</span></p>
            </li>
            <li>
                <p class="fw-bold">Icon: <span class="fw-light"><i class="fas fa-{{$piggy_bank->icon}}" style="color: {{$piggy_bank->color}};"></i> ({{$piggy_bank->icon}})</span></p>    
            </li>
            <li>
                <p class="fw-bold">Color: <span class="fw-light" style="color: {{$piggy_bank->color}}">({{$piggy_bank->color}})</span></p>
            </li>
        </ul>

        <form action="/piggy-bank/destroy" method="post">
            @csrf
            @method('DELETE')
            <input type="hidden" name="id_piggy_bank" value="{{$piggy_bank->id_piggy_bank}}">
            <div class="d-flex justify-content-end">
                <a href="/piggy-bank" class="btn btn-secondary me-2"><i class="fas fa-piggy-bank"></i> List of piggies banks</a>
                <button type="submit" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i> Delete piggy bank</button>
            </div>
        </form>
    </div>
    @include('piggy-bank/components/list')
@endsection