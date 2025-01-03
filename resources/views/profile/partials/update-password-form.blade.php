<section>
    <header>
        <h2>
            {{ __('Aggiorna Password') }}
        </h2>

        <p>
            {{ __('Assicurati che il tuo account utilizzi una password lunga e casuale per rimanere sicuro.') }}
        </p>
    </header>

    @include('partials.validate')

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6 form_update_password">
        @csrf
        @method('PATCH')

        <div class="mb-4 form-floating">

            <input type="text" name="name" id="name" value="{{ $user->name }}" style="display: none;">
            <input type="text" name="email" id="email" value="{{ $user->email }}" style="display: none;">


            <input id="current_password" type="password" name="current_password"
                class="mt-1 form-control @error('current_password') is-invalid @enderror"
                onkeyup="check_current_password( '{{ $user->password }}')" autocomplete="current-password">
            <label for="current_password" value="{{ Hash::make(old('password')) }}">{{ __('Vecchia Password') }}</label>
            @error('current_password')
                <span class="invalid-feedback mt-2" role="alert">
                    <strong>{{ $errors->updatePassword->get('current_password') }}</strong>
                </span>
            @enderror
        </div>

        <div class="mb-4 form-floating">
            <input class="mt-1 form-control" type="password" name="password" id="password_new"
                autocomplete="new-password">
            <label for="password_new">{{ __('Nuova Password') }}</label>

            @error('password')
                <span class="invalid-feedback mt-2" role="alert">
                    <strong>{{ $errors->updatePassword->get('password') }}</strong>
                </span>
            @enderror
        </div>

        <div class="mb-4 form-floating">

            <input class="mt-2 form-control" type="password" name="password_confirmation" id="password_confirmation"
                autocomplete="new-password" onkeyup="hide_error_password()" onblur="check_password()">
            <label for="password_confirmation">{{ __('Conferma Passowrd') }}</label>

            <span id="password_error" style="display: none; color: red;">
                La password non combaciano
            </span>

            @error('password_confirmation')
                <span class="invalid-feedback mt-2" role="alert">
                    <strong>{{ $errors->updatePassword->get('password_confirmation') }}</strong>
                </span>
            @enderror
        </div>

        <div class="d-flex align-items-center gap-4">
            <button id="btn_save" type="submit" class="btn btn_save"
                onclick="check_ever(event)">{{ __('Salva') }}</button>
            <button id="btn_loading" class="btn btn_save" style="display:none;" disabled>{{ __('Attendi..') }}</button>
            @if (session('status') === 'profile-updated')
                <script>
                    // console.log(document.getElementById('profile-status'0
                    setTimeout(() => {
                        const el = document.getElementById('profile-status')


                        let show = true;
                        if (show) {
                            setTimeout(() => {
                                el.style.transform = " translatex(0%)"
                            }, 200)
                        }
                        setTimeout(() => {
                            el.style.transform = " translatex(-100%)"
                            show = false
                        }, 2000)
                    }, 100)
                </script>

                <div class="overlay_success" id="profile-status">

                    <div class="container_success">
                        <img src="{{ asset('img/checked.png') }}" alt="">
                        <p>
                            La password e stata aggiornata.
                        </p>
                    </div>
                </div>
            @endif
        </div>
    </form>
</section>
