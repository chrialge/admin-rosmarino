@extends('layouts.login')

@section('content')
    <div class="container_login pb-3">

        <div class="header_login">
            <h2>Recupero password</h2>

            <i id="theme-button" class="ri-sun-fill"></i>
        </div>

        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <form class="login" method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="login_field">
                <i class="login_icon fas fa-user"></i>
                <input type="email" class="login__input @error('email') is-invalid @enderror" placeholder="Email"
                    id="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="social-login">
                <a href="{{ route('register') }}">
                    Registrati
                </a>

                <a href="{{ route('login') }}">Accedi</a>
            </div>



            <div class="d-flex justify-content-center mb-5">
                <button class="btn login_submit" id="btn_send" type="submit" onclick="showLoading()">
                    <span class="button__text">mando una email per il reset</span>
                    <i class="button__icon fas fa-chevron-right"></i>
                </button>

                <button id="btn_loading" class="btn login_submit" style="display: none" disabled>
                    <span class="button__text">Attendi ..</span>
                    <i class="button__icon fas fa-chevron-right"></i>
                </button>
            </div>
        </form>
        <script>
            function showLoading() {
                const btnLoading = document.getElementById('btn_loading').style.display = '';
                const btn = document.getElementById('btn_send').style.display = 'none'
            }
        </script>



    </div>
@endsection
