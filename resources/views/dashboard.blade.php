@extends('layout/_content')

@section('title') Dashboard @endsection

@section('styles')
    <style>
        .col-resume{
            max-height: 100vh;
            scrollbar-width: none;
        }

    </style>
@endsection

@section('body')
    <div class="row container-fluid m-0 p-0 vh-100">
        <div class="col-lx-2 col-lg-2 col-md-12 col-sm-12 px-4 bg-light">
            <div class="d-flex flex-column justify-content-between h-100 py-4">
                <div>
                    <div class="mt-2 mb-4">
                        <h3 class="mb-0">{{Auth::user()->first_name}}</h3>
                        <p class="fw-light">Welcome back to bwallet</p>
                    </div>
                    <ul class="nav flex-column mt-4">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/dashboard"><i class="fas fa-chart-line"></i> Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/transaction"><i class="fas fa-file-invoice-dollar"></i> Transactions</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/category"><i class="fas fa-list"></i> Categories</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/payment"><i class="far fa-credit-card"></i> Payment</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/piggy-bank"><i class="fas fa-piggy-bank"></i> Piggies bank</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-danger" href="/logout"><i class="fas fa-sign-out-alt"></i> Logout</a>
                        </li>
                    </ul>
                </div>
                {{--
                    <div>
                        <a href="#" class="btn btn-secondary">Buy premium version NOW</a>
                    </div>
                --}}
            </div>
        </div>
        <div class="col-xl-10 col-lg-12 col-md-12 col-sm-12 overflow-auto col-resume">
            <div class="d-flex justify-content-between">
                <div>
                    <h1>Monthly sumup</h1>
                    <p class="fw-light">Get summary of your monthly online transactions here.</p>
                </div>
                <div class="d-flex align-items-center">
                    <a class="nav-link" href="/payment">
                        <i class="fas fa-headset"></i>
                    </a>
                    <a class="nav-link" href="/payment">
                        <i class="fas fa-bell"></i>
                    </a>
                    <div class="d-flex align-items-center">
                        <div style="background-color: gray; height: 30px; width: 30px; border-radius: 100%;">
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-between">
                <div>
                    <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#create-transaction">
                        <i class="fas fa-cash-register"></i> Create a new transation
                    </button>
                </div>
                <form action="/dashboard" method="GET" class="d-flex align-items-center">
                    <input class="form-group me-2 align-items-center" type="month" id="month" name="filter" value="{{date('Y').'-'.date('m')}}">
                    <button type="submit" class="btn btn-sm button-outline-lilblue btn-secondary"><i class="fas fa-search-dollar"></i> Search</button>
                </form>
            </div>
            <div class="row">
                <div class="col-lx-6 col-lg-6 col-md-12 col-sm-12 px-4">
                    <section id="resume-display">
                        <div class="row text-center">
                            <div class="col-4">
                                <h4 class="resume-display mb-0 text-{{$balance >= 0 ? 'primary' : 'warning'}}">R$ {{$balance}}</h4>
                                <h6 class="fw-light">Current balance</h6>
                            </div>
                            <div class="col-4">
                                <h4 class="income-display mb-0 text-success">R$ {{$income}}</h4>
                                <h6 class="fw-light">Income</h6>
                            </div>
                            <div class="col-4">
                                <h4 class="outcome-display mb-0 text-danger">R$ {{$outcome}}</h4>
                                <h6 class="fw-light">Outcome</h6>
                            </div>
                        </div>
                        <canvas id="resumeChart" style="max-height: 400px"></canvas>
                    </section>
                    <section id="transaction history">
                        <h5>Transactions history</h5>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col" class="fw-light">Reciever</th>
                                    <th scope="col" class="fw-light text-center">Type</th>
                                    <th scope="col" class="fw-light text-center">Category</th>
                                    <th scope="col" class="fw-light text-center">Date</th>
                                    <th scope="col" class="fw-light text-end">Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transactions as $t)
                                <tr>
                                    <th scope="row">{{$t->transaction}}</th>
                                    <td class="fw-light text-center">{{$t->accounting_entry == 1 ? 'Credit' : 'Debit'}}</td>
                                    <td class="fw-light text-center" style="color: {{$t->color}};"><i class="fas fa-{{$t->icon}}"></i> {{$t->title}}</td>
                                    <td class="fw-light text-center">{{date_format(new DateTime($t->occurrence_at), 'd M Y')}}</td>
                                    <td class="fw-bold text-end">R$ {{$t->amount}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </section>
                </div>
                <div class="col-lx-6 col-lg-6 col-md-12 col-sm-12 px-4">
                    <section id="goals">
                        <h5>Piggies banks</h5>
                        <div class="row">
                            @foreach ($piggies_bank as $p)
                            <div class="col-4">
                                <section id="card-goal">
                                    <div class="d-flex align-items-end">
                                        <h5 class="mb-0 me-2">R$ {{$p->total}}</h5> <span class="fw-light">R$ {{$p->amount}}</span>
                                    </div>
                                    <p class="fw-light">{{$p->milestone ? date_format(new DateTime($p->milestone), 'd M Y') : ''}}</p>
                                    <h6 class="fw-light" style="color: {{$p->color}};">
                                        <i class="fas fa-{{$p->icon}}"></i> {{$p->title}}
                                    </h6>
                                </section>
                            </div>
                            @endforeach
                        </div>
                    </section>
                    <section id="category-statistics">
                        <h5>Outcome statistics</h5>
                        <canvas id="outcomeCategoryChart" style="max-height: 300px"></canvas>
                        <h5>Income statistics</h5>
                        <canvas id="incomeCategoryChart" style="max-height: 300px"></canvas>
                    </section>
                    <section id="payment-stastistics">
                        <h5>Payment statistics</h5>
                    </section>
                </div>
            </div>
        </div>
    </div>
@endsection

@include('transaction/components/modal')

@section('scripts')
    @include('dashboard.resume')
    @include('dashboard.category')
@endsection
