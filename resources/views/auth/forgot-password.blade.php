@extends('layouts.login')

@section('content')
    <div class="pt-4 pb-5">
        <h2 class="text-white">Recupero password</h2>
    </div>

    <div class="container pb-3">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <div class="screen">

            <i class="fa fa-arrow-left" aria-hidden="true" onclick="window.history.go(-1);"></i>
            <div class="screen__content">
                <form class="login" method="POST" action="{{ route('password.email') }}">
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

                    <button class="button login__submit" type="submit">
                        <span class="button__text">mando una email per il reset</span>
                        <i class="button__icon fas fa-chevron-right"></i>
                    </button>
                </form>

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
