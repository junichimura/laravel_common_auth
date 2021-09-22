@extends('laravel_common_auth::layouts.main')
@push('style')
    <style>

        .form-register {
            width: 100%;
            max-width: 440px;
            padding: 15px;
            margin: auto;
        }

        .form-register .form-floating:focus-within {
            z-index: 2;
        }

        .form-register input[type="text"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }

        .form-register input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }

        .form-register input[type="password"] {
            margin-bottom: -1px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }

        #floatingPasswordConfirmation {
            margin-bottom: 10px;
        }

    </style>
@endpush
@section('container')
    <div class="card form-register bg-light">
        <div class="card-body">
            <h1 class="h3 mb-3 fw-normal">{{__('laravel_common_auth::register.title')}}</h1>
            <form method="post">
                @csrf
                <div class="form-floating">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="floatingInputName" name="name" placeholder="name@example.com" value="{{old('name')}}">
                    <label for="floatingInputName">{{__('laravel_common_auth::register.name')}}</label>
                    @error('name')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-floating">
                    <input type="email" class="form-control @error('user_id') is-invalid @enderror" id="floatingInputId" name="user_id" placeholder="name@example.com" value="{{old('user_id')}}">
                    <label for="floatingInputId">{{__('laravel_common_auth::register.id')}}</label>
                    @error('user_id')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="floatingPassword" name="password" placeholder="Password">
                    <label for="floatingPassword">{{__('laravel_common_auth::register.password')}}</label>
                    @error('password')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="floatingPasswordConfirmation" name="password_confirmation" placeholder="Password Confirmation">
                    <label for="floatingPasswordConfirmation">{{__('laravel_common_auth::register.password_confirmation')}}</label>
                </div>
                <hr>
                <button class="w-100 btn btn-lg btn-primary" type="submit">{{__('laravel_common_auth::register.submit')}}</button>
            </form>
        </div>
    </div>
@endsection