<!doctype html>
<html lang="pt-br">
@include('layout.components.__head')
<body>
    <header class="container">
        <ul class="nav justify-content-end">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/dashboard">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/transaction">Transactions</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/category">Categories</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/payment">Payment</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/piggy-bank">Piggies bank</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-danger" href="/logout">Logout</a>
            </li>
        </ul>
    </header>
    <div class="container">
        <div class="my-2">
            @include('layout.components.__message')
        </div>
        @yield('body')
    </div>
    <footer class="bg-primary text-center py-4 mt-2">
        &copy; Bwallet | 2021
    </footer>
</body>
@include('layout.components.__scripts')
</html>
