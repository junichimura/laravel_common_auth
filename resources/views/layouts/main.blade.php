<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>{{config('app.name')}}</title>

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    @stack('style')
</head>
<body>

<header class="p-3 mb-3 border-bottom bg-light">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mr-3 mb-2 mb-lg-0 text-dark text-decoration-none pe-2">
                <span class="fs-4">{{config('app.name')}}</span>
            </a>
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
            @auth
                <li><a href="#" class="nav-link px-2 link-dark">Menu1</a></li>
                <li><a href="#" class="nav-link px-2 link-dark">Menu2</a></li>
                <li><a href="#" class="nav-link px-2 link-dark">Menu3</a></li>
                <li><a href="#" class="nav-link px-2 link-dark">Menu4</a></li>
            @endauth
            </ul>

            <div class="col-md-3 text-end">
            @auth
                <div class="dropdown">
                    <button class="btn btn-lg dropdown-toggle" type="button" id="nav-account-menu" data-bs-toggle="dropdown" aria-expanded="false">
                        {{__('laravel_common_auth::common.account_menu')}}
                    </button>
                    <ul class="dropdown-menu" area-labelledby="nav-account-menu">
                        <li>
                            <a href="#" class="dropdown-item">
                                <p class="mx-3 mb-0">
                                    <small>{{__('laravel_common_auth::common.account_menu_name')}}</small>
                                </p>
                                <p class="mx-3 mb-0 text-end">
                                    {{auth()->user()->name}}
                                </p>
                            </a>
                        </li>
                        <div class="dropdown-divider"></div>
                        <li><button class="dropdown-item" type="button">submenu</button></li>
                        <li><button class="dropdown-item" type="button">submenu</button></li>
                        <div class="dropdown-divider"></div>
                        <li>
                            <form action="{{route('logout')}}" method="post">
                                @csrf
                                <button type="submit" class="dropdown-item">{{__('laravel_common_auth::common.logout')}}</button>
                            </form>
                        </li>
                    </ul>
                </div>
            @else
                @if (Route::has('login'))
                    <a href="{{ route('login') }}" class="btn btn-outline-primary me-2">Login</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" type="button" class="btn btn-primary">Sign-up</a>
                    @endif
                @endif
            @endauth
            </div>
        </div>
    </div>
</header>

<main class="container">
    @yield('container')
</main>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

@stack('script')

</body>
</html>
