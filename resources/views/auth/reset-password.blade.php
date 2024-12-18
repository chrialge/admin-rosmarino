@extends('layouts.login')

@section('script')
    <script src="{{ asset('js/reset_password_validation.js') }}"></script>
@endsection

@section('content')
    <div class="container_login pb-3">

        <div class="header_login">
            <h2>{{ __('Reset Password') }}</h2>

            <i id="theme-button" class="ri-sun-fill"></i>
        </div>



        <form class="login" method="POST" action="{{ route('password.store') }}">
            @csrf

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">


            <div class="login_field" id="email_container">
                <i class="login_icon fas fa-envelope"></i>
                <input id="email" type="email" placeholder="Email"
                    class="login__input register_input  @error('email') is-invalid @enderror" name="email"
                    value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus
                    onkeyup="hide_email_error()" onblur="check_email()">

            </div>
            @error('email')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <span class="error_email_js pt-2" style="display: none; color: red; ">
                L'email non e valida
            </span>


            <div class="login_field" id="container_password">
                <i class="login_icon fas fa-lock"></i>
                <input id="password" type="password" placeholder="Password" id="password"
                    class="@error('password') is-invalid @enderror" name="password" required autocomplete="new-password"
                    value="{{ old('password') }}">
                <i class="fa-solid fa-eye register_pass login_icon showPassword" id="register_pass"
                    onclick="showPassword(event, 'password')"></i>
            </div>
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror



            <div class="login_field" id="container_password_">
                <i class="login_icon fas fa-lock"></i>

                <input id="password-confirm" type="password"
                    class="login__input register_input @error('password_confirmation') is-invalid  @enderror"
                    value="{{ old('password_confirmation') }}" name="password_confirmation" required
                    autocomplete="new-password" placeholder="Conferma password" onkeyup="hide_error_pw()"
                    onblur="check_pw()">
                <i class="fa-solid fa-eye register_pass login_icon showPassword" id="register_pass"
                    onclick="showPassword(event,'password-confirm')"></i>

            </div>
            @error('email')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <span class="error_pw_js pt-3 pb-4" style="display: none; width: 80%; color: red; font-size: 13px">
                Le password non combacciono
            </span>




            <div class="d-flex justify-content-center mb-5">
                <button id="reset_btn" class="btn login_submit" type="submit" onclick="check_ever(event)">
                    <span class="button__text">Reset</span>
                    <i class="button__icon fas fa-chevron-right"></i>
                </button>

                <button id="btn_loading" class="btn login_submit" onclick="check_ever(event)" style="display: none"
                    disabled>
                    <span class="button__text">Attendi..</span>
                    <i class="button__icon fas fa-chevron-right"></i>
                </button>
            </div>
        </form>



    </div>
@endsection
