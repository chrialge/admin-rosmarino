@extends('layouts.login')

@section('content')
    <div class="pt-4 pb-5">
        <h2 class="text-white">Accedi</h2>
    </div>
    <div class="container pb-3">



        <div class="screen">
            <div class="screen__content">
                <form class="login" method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="login__field">
                        <i class="login__icon fas fa-user"></i>
                        <input type="email" class="login__input @error('email') is-invalid @enderror" placeholder="Email"
                            id="email" name="email" value="{{ old('email') }}" required autocomplete="email"
                            autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="login__field">
                        <i class="login__icon fas fa-lock"></i>
                        <input type="password" class="login__input @error('password') is-invalid @enderror"
                            placeholder="Password" id="password" name="password" required autocomplete="current-password"
                            value="{{ old('password') }}">
                        <i class="fa-solid fa-eye icon_pass login__icon" id="showPassword"></i>

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>


                    <div class="mb-4">
                        <div class="form-check d-flex align-items-center gap-2 p-0">
                            <input class="form-check-input m-0 p-0" type="checkbox" name="remember" id="remember"
                                {{ old('remember') ? 'checked' : '' }} style="width:20px; height: 20px;">

                            <label class="form-check-label" for="remember">
                                {{ __('Ricordati') }}
                            </label>
                        </div>

                    </div>
                    <button class="button login__submit" type="submit">
                        <span class="button__text">Accedi</span>
                        <i class="button__icon fas fa-chevron-right"></i>
                    </button>
                </form>
                <div class="social-login">
                    <span>
                        <a href="{{ route('register') }}"> Non hai un account?</a>
                    </span>
                    @if (Route::has('password.request'))
                        <span>
                            <a href="{{ route('password.request') }}">Ti sei dimenticato la password?</a>
                        </span>
                    @endif

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
