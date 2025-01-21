@extends('layouts.login')

@section('content')
    <div class="container_login pb-3">

        <div class="header_login">
            <h2>Registrati</h2>

            <i id="theme-button" class="ri-sun-fill"></i>
        </div>






        <form id="register" class="login" method="POST" action="{{ route('register') }}" onsubmit="check_form(event)">
            @csrf

            <div class="login_field">
                <i id="name_icon" class="login_icon fas fa-user"></i>
                <input type="name" onkeyup="hide_name_error()" onblur="check_name()"
                    class="login__input register_input @error('name') is-invalid @enderror" placeholder="Name"
                    id="name" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror


            </div>
            <span class="error_name_js" style="display: none; color: red; font-size: 13px">
                Il nome deve essere almeno di 3 caratteri e non numeri
            </span>

            <div class="login_field">
                <i class="login_icon fas fa-envelope"></i>
                <input type="email" onkeyup="hide_email_error()" onblur="check_email()"
                    class="login__input register_input @error('email') is-invalid @enderror" placeholder="Email"
                    id="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror


            </div>
            <span class="error_email_js" style="display: none; color: red; font-size: 13px">
                L'email non e valida
            </span>

            <div class="login_field">
                <i class="login_icon fas fa-lock"></i>
                <input type="password" class="login__input register_input @error('password') is-invalid @enderror"
                    placeholder="Password" id="password" name="password" required autocomplete="current-password"
                    value="{{ old('password') }}" onkeyup="hide_pw_error()" onblur="check_pw()">
                <i id="icon_pw" class="fa-solid fa-eye register_pass login_icon showPassword"
                    onclick="showPassword('password', 'icon_pw')"></i>

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="login_field">
                <i class="login_icon fas fa-lock pe-5"></i>
                <input type="password" class="login__input register_input @error('password-confirm') is-invalid @enderror"
                    placeholder="Conferma Password" id="password-confirm" name="password_confirmation" required
                    autocomplete="new-password" value="{{ old('password-confirm') }}" onkeyup="hide_pw_error()"
                    onblur="check_pw()">
                <i id="icon-pw-confirm" class="fa-solid fa-eye register_pass login_icon showPassword"
                    onclick="showPassword('password-confirm', 'icon-pw-confirm')"></i>


            </div>
            <span class="error_pw_js pb-3" style="display: none; color: red; font-size: 13px">
                Le password non combacciono
            </span>




            <div class="form_check mb-4">
                <input class="form-check-input m-0 p-0" type="checkbox" name="remember" id="remember"
                    {{ old('remember') ? 'checked' : '' }} style="width:20px; height: 20px;">

                <label class="form-check-label" for="remember">
                    {{ __('Ricordati') }}
                </label>
            </div>



            <div class="social-login">

                <a href="{{ route('login') }}">Accedi</a>
            </div>

            <div class="d-flex justify-content-center mb-5">
                <button id="register_input" class="btn login_submit" type="submit">
                    <span class="button__text">Registarti</span>
                    <i class="button__icon fas fa-chevron-right"></i>
                </button>
                <button id="loading_btn" class="btn login_submit" style="display: none" disabled>
                    <span class="button__text">Attendi..</span>
                </button>
            </div>


        </form>


    </div>
@endsection


@section('script')
    <script src="{{ asset('js/register_validation.js') }}"></script>
@endsection
