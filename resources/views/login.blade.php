@extends('laravel_common_auth::layouts.main')
@push('style')
    <style>

        .form-signin {
            width: 100%;
            max-width: 440px;
            padding: 15px;
            margin: auto;
        }

        .form-signin .form-floating:focus-within {
            z-index: 2;
        }

        .form-signin input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }

        .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }

    </style>
@endpush
@section('container')
    <div class="card form-signin bg-light">
        <div class="card-body">
            <h1 class="h3 mb-3 fw-normal">{{__('laravel_common_auth::login.title')}}</h1>
            <form method="post">
                @csrf
                <div class="form-floating">
                    <input type="email" class="form-control @error('user_id') is-invalid @enderror" id="floatingInput" name="user_id" placeholder="name@example.com" value="{{old('user_id')}}">
                    <label for="floatingInput">{{__('laravel_common_auth::login.id')}}</label>
                    @error('user_id')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="floatingPassword" name="password" placeholder="Password">
                    <label for="floatingPassword">{{__('laravel_common_auth::login.password')}}</label>
                    @error('password')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <hr>
                <button class="w-100 btn btn-lg btn-primary" type="submit">{{__('laravel_common_auth::login.submit')}}</button>
            </form>
        </div>
    </div>
@endsection