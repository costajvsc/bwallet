<!doctype html>
<html lang="pt-br">
@include('layout.components.__head')
<body>
    <header class="pt-2 pb-4 bg-light">
        <div class="container">
            <ul class="nav justify-content-end">
                <img src="{{asset('img/icon.png')}}" class="me-auto d-block" alt="Logo bwallet"  width="30" height="30">
                @include('layout._navbar_options')
            </ul>
        </div>
    </header>
    <main class="container h-100">
        <div class="my-2">
            @include('layout.components.__message')
        </div>
        @yield('body')
    </main>
    <footer class="bg-primary text-center py-4 mt-2">
        &copy; Bwallet | 2021
    </footer>
</body>
@include('layout.components.__scripts')
</html>
