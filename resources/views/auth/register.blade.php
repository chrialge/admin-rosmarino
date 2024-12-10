@extends('layouts.login')

@section('content')
    {{-- <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="mb-4 row">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="mb-4 row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="pt-4 pb-5">
        <h2 class="text-white">Registrati</h2>
    </div>
    <div class="container pb-3">



        <div class="screen screen_register">
            <div class="screen__content">
                <form id="register" class="login" method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="login__field">
                        <i class="login__icon fas fa-user"></i>
                        <input type="name" onkeyup="hide_name_error()" onblur="check_name()"
                            class="login__input register_input @error('name') is-invalid @enderror" placeholder="Name"
                            id="name" name="name" value="{{ old('name') }}" required autocomplete="name"
                            autofocus>

                        @error('name')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <span class="error_name_js" style="display: none; width: 80%; color: red; font-size: 13px">
                            Il nome deve essere almeno di 3 caratteri e non numeri
                        </span>
                    </div>

                    <div class="login__field">
                        <i class="login__icon fas fa-envelope"></i>
                        <input type="email" onkeyup="hide_email_error()" onblur="check_email()"
                            class="login__input register_input @error('email') is-invalid @enderror" placeholder="Email"
                            id="email" name="email" value="{{ old('email') }}" required autocomplete="email"
                            autofocus>

                        @error('email')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <span class="error_email_js" style="display: none; width: 80%; color: red; font-size: 13px">
                            L'email non e valida
                        </span>
                    </div>

                    <div class="login__field">
                        <i class="login__icon fas fa-lock"></i>
                        <input type="password" class="login__input register_input @error('password') is-invalid @enderror"
                            placeholder="Password" id="password" name="password" required autocomplete="current-password"
                            value="{{ old('password') }}" onkeyup="hide_pw_error()" onblur="check_pw()">
                        <i class="fa-solid fa-eye register_pass login__icon showPassword"></i>

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="login__field">
                        <i class="login__icon fas fa-lock"></i>
                        <input type="password"
                            class="login__input register_input @error('password-confirm') is-invalid @enderror"
                            placeholder="Conferma Password" id="password-confirm" name="password_confirmation" required
                            autocomplete="new-password" value="{{ old('password-confirm') }}" onkeyup="hide_pw_error()"
                            onblur="check_pw()">
                        <i class="fa-solid fa-eye register_pass login__icon showPassword"></i>

                        <span class="error_pw_js" style="display: none; width: 80%; color: red; font-size: 13px">
                            Le password non combacciono
                        </span>
                    </div>


                    <button id="register_input" class="button login__submit" type="submit">
                        <span class="button__text">Accedi</span>
                        <i class="button__icon fas fa-chevron-right"></i>
                    </button>
                </form>
                <div class="social-login">
                    <span>
                        <a href="{{ route('login') }}">Hai un account?</a>
                    </span>
                </div>
            </div>
            <div class="screen__background">
                <span class="screen__background__shape screen__background__shape4"></span>
                <span class="screen__background__shape screen__background__shape3"></span>
                <span class="screen__background__shape screen__background__shape2"></span>
                <span class="screen__background__shape screen__background__shape1"></span>
            </div>
        </div>
    </div>
@endsection


@section('script')
    <script src="{{ asset('js/register_validation.js') }}"></script>
@endsection
