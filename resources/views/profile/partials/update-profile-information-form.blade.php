<section>
    <header>
        <h2>
            {{ __('Informazioni di profilo') }}
        </h2>

        <p class="mt-1 text-muted">
            {{ __("Aggiorna le informazioni del profilo e l'indirizzo email del tuo account.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6 form_profile_information">
        @csrf
        @method('patch')

        <div class="mb-4 form-floating">

            <input class="form-control" type="text" name="name" id="name" autocomplete="name"
                value="{{ old('name', $user->name) }}" required autofocus>
            <label for="name">{{ __('Nome') }}</label>
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->get('name') }}</strong>
                </span>
            @enderror
        </div>

        <div class="mb-4 form-floating">


            <input id="email" name="email" type="email"
                class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $user->email) }}"
                required autocomplete="username" />
            <label for="email">
                {{ __('Email *') }}
            </label>
            @error('email')
                <span class="alert alert-danger mt-2" role="alert">
                    <strong>{{ $errors->get('email') }}</strong>
                </span>
            @enderror

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-muted">
                        {{ __('Il tuo indirizzo email non è verificato.') }}

                        <button form="send-verification" class="btn btn-outline-dark">
                            {{ __("Fare clic qui per inviare nuovamente l'e-mail di verifica.") }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 text-success">
                            {{ __('Un nuovo link di verifica è stato inviato al tuo indirizzo email.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="d-flex align-items-center gap-4">
            <button class="btn btn_save" type="submit">{{ __('Salva') }}</button>

            @if (session('status') === 'profile-updated')
                <script>
                    console.log('ciao')

                    // aspetto che si sia ricaricata tutta la pagina 
                    window.addEventListener('load', function() {

                        setTimeout(() => {
                            const el = document.getElementById('profile-status')
                            el.style.display = ""

                            let show = true;
                            if (show) {
                                setTimeout(() => {
                                    el.style.transform = " translatex(0%)"
                                }, 200)
                            }
                            setTimeout(() => {
                                el.style.transform = " translatex(-100%)"
                                show = false
                            }, 2400)
                        }, 2300)
                    });
                    // console.log(document.getElementById('profile-status'))
                </script>
            @endif
            <div class="overlay_success" id="profile-status" style="display: none">

                <div class="container_success">
                    <img src="{{ asset('img/checked.png') }}" alt="">
                    <p>
                        I tuoi Dati sono stati aggiornati con successo.
                    </p>
                </div>
            </div>

        </div>


    </form>
</section>
