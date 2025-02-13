@extends('layouts.login')



@section('content')
    <div class="container_login pb-3">

        <div class="header_login">
            <h2>Accedi</h2>

            <i id="theme-button" class="ri-sun-fill"></i>
        </div>

        <form class="login" method="POST" action="{{ route('login') }}" id="login_form">
            @csrf

            <div class="login_field">
                <i class="login_icon fas fa-user"></i>
                <input type="email" class="login__input @error('email') is-invalid @enderror" placeholder="Email"
                    id="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

            </div>

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <div class="login_field">
                <i class="login_icon fas fa-lock"></i>
                <input type="password" class="login__input @error('password') is-invalid @enderror" placeholder="Password"
                    id="password" name="password" required autocomplete="current-password" value="{{ old('password') }}">
                <i class="fa-solid fa-eye icon_pass login_icon" id="showPassword"></i>
            </div>

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror



            <div class="form_check mb-4">
                <input class="form-check-input m-0 p-0" type="checkbox" name="remember" id="remember"
                    {{ old('remember') ? 'checked' : '' }} style="width:20px; height: 20px;">

                <label class="form-check-label" for="remember">
                    {{ __('Ricordati') }}
                </label>
            </div>




            <div class="social-login">

                <a href="{{ route('register') }}">
                    Registrati
                </a>

                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">
                        Dimenticato la password?
                    </a>
                @endif
            </div>

            <div class="d-flex justify-content-center mb-5">
                <button class="btn login_submit g-recaptcha" type="submit"
                    data-sitekey="{{ config('services.recaptcha.site_key') }}" data-callback='onSubmit' data-action='login'>
                    <span class="button__text">Accedi</span>
                    <i class="button__icon fas fa-chevron-right"></i>
                </button>
            </div>


        </form>

        <script>
            if (localStorage.getItem('route-page')) {

                localStorage.removeItem('route-page');

            }

            function onSubmit(token) {
                document.getElementById("login_form").submit();
            }
        </script>

    </div>
@endsection
