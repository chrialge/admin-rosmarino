@extends('layouts.admin')

@section('script')
    <script src="{{ asset('js/edit_reservation_customer_validation.js') }}"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
@endsection


@section('content')
    <div class="container-reservation">

        {{-- percorso di file / breadcrumb --}}
        <ul class="d-flex gap-2 list-unstyled">
            <li>
                <a href="#" style="color: hsl(228, 8%, 56%); font-weight:600;">
                    Dashboard
                </a>
            </li>
            <li>
                <span>
                    /
                </span>
            </li>
            <li>
                <a href="{{ route('admin.reservations.index') }}" style="font-weight: 600; color: hsl(228, 8%, 56%);">
                    Prenotazione
                </a>
            </li>
            <li>
                <span>
                    /
                </span>
            </li>
            <li>
                <a href="#" class="text-decoration-none" style="font-weight: 600; color: hsl(39, 100%, 50%);">
                    Modifica
                </a>
            </li>
        </ul>

        {{-- header della pagina --}}
        <div class="header_page_edit g-1">

            {{-- titolo --}}
            <h2>
                Modifica di: {{ $reservation->customer_name }}
            </h2>

            {{-- bottone che manda alla pagina precedente --}}
            <a href="{{ route('admin.reservations.index') }}" class="btn btn_return">
                <span>Indietro</span>
                <i class="ri-arrow-left-circle-line"></i>
            </a>
        </div>

        {{-- contenitore del form --}}
        <div class="container_form_modify mb-3">

            {{-- form --}}
            <form action="{{ route('admin.reservations.update', $reservation) }}" method="post"
                onsubmit="check_validation(event)">
                @csrf
                @method('PUT')

                {{-- campo name del prenotato --}}
                <div class=" form-floating">

                    <input type="text" onkeyup="hide_name_error()" onblur="check_name()"
                        class="form-control @error('customer_name') is-invalid @enderror" name="customer_name"
                        id="customer_name" aria-describedby="customerNameHelper"
                        value="{{ old('customer_name', $reservation->customer_name) }}" placeholder="" required />
                    <label for="customer_name" class="form-label">Nome *</label>

                    {{-- span di errore lato front --}}
                    <span id="name_error" class="text-danger" role="alert" style="display: none; font-weight: 600;">
                        Il nome deve essere almeno di 3 caratteri e massimo 100 caratteri
                    </span>

                    {{-- errore lato back --}}
                    @error('customer_name')
                        <div id="name_error_back" class="text-danger">{{ $message }}</div>
                    @enderror

                    <small id="customerNameHelper" class="">
                        Inserisci il nome del prenotato
                    </small>

                </div>

                {{-- campo cognome del prenotato --}}
                <div class=" form-floating">

                    <input type="text" onkeyup="hide_last_name_error()" onblur="check_last_name()"
                        class="form-control @error('customer_last_name') is-invalid @enderror" name="customer_last_name"
                        id="customer_last_name" aria-describedby="customerLastNameHelper"
                        value="{{ old('customer_last_name', $reservation->customer_last_name) }}" placeholder="" required />
                    <label for="customer_last_name" class="form-label">Cognome *</label>

                    {{-- span di errore lato front --}}
                    <span id="last_name_error" class="text-danger" role="alert" style="display: none; font-weight: 600;">
                        Il cognome deve essere almeno di 3 caratteri e massimo 100 caratteri
                    </span>

                    {{-- errore lato back --}}
                    @error('customer_last_name')
                        <div id="name_error_back" class="text-danger">{{ $message }}</div>
                    @enderror

                    <small id="customerLastNameHelper" class="">
                        Inserisci il cognome del prenotato
                    </small>

                </div>

                {{-- campo email del prenotato --}}
                <div class=" form-floating">

                    <input type="email" onkeyup="hide_email_error()" onblur="check_email()"
                        class="form-control @error('customer_email') is-invalid @enderror" name="customer_email"
                        id="customer_email" aria-describedby="customerEmailHelper"
                        value="{{ old('customer_email', $reservation->customer_email) }}" placeholder="" required />
                    <label for="customer_email" class="form-label">Email *</label>

                    {{-- span di errore lato front --}}
                    <span id="email_error" class="text-danger" role="alert" style="display: none; font-weight: 600;">
                        L'email deve essere corretta
                    </span>

                    {{-- errore lato back --}}
                    @error('customer_email')
                        <div id="name_error_back" class="text-danger">{{ $message }}</div>
                    @enderror

                    <small id="customerEmailHelper" class="">
                        Inserisci l'email del prenotato
                    </small>

                </div>

                {{-- campo telefono del prenotato --}}
                <div class=" form-floating">
                    <input type="number" onkeyup="hide_telephone_error()" onblur="check_telephone()"
                        class="form-control @error('customer_telephone') is-invalid @enderror" name="customer_telephone"
                        id="customer_telephone" aria-describedby="customerTelephoneHelper"
                        value="{{ old('customer_telephone', $reservation->customer_telephone) }}" placeholder=""
                        required />
                    <label for="customer_telephone" class="form-label">Telefono *</label>

                    {{-- span di errore lato front --}}
                    <span id="telephone_error" class="text-danger" role="alert" style="display: none; font-weight: 600;">
                        Il numero di telefono e obbligatio
                    </span>

                    {{-- errore lato back --}}
                    @error('customer_telephone')
                        <div id="name_error_back" class="text-danger">{{ $message }}</div>
                    @enderror

                    <small id="customerTelephoneHelper" class="">
                        Inserisci il numero del prenotato
                    </small>

                </div>

                {{-- campo di numero di persone --}}
                <div class=" form-floating">

                    <input type="number" min="0" max="150" onkeyup="hide_person_error()"
                        onblur="check_person()" class="form-control @error('person') is-invalid @enderror" name="person"
                        id="person" aria-describedby="personHelper" value="{{ old('person', $reservation->person) }}"
                        placeholder="" />
                    <label for="person" class="form-label">Persone *</label>


                    {{-- span di errore lato front --}}
                    <span id="person_error" class="text-danger" role="alert" style="display: none; font-weight: 600;">
                        Il numero di persone è obbligatorio
                    </span>

                    {{-- errore lato back --}}
                    @error('person')
                        <div id="name_error_back" class="text-danger">{{ $message }}</div>
                    @enderror

                    <small id="personHelper" class="">
                        Inserisci il numero di persone della prenotazione
                    </small>

                </div>

                {{-- input della data della prenotazione --}}
                <div class=" form_data_time">
                    <input type="date" class="date" id="date" name="date"
                        value="{{ old('date', $reservation->date) }}">

                    <small id="personHelper" class="">
                        Inserisci la data della prenotazione
                    </small>
                </div>

                {{-- input time della prenotazione --}}
                <div class=" form_data_time">
                    <input type="time" name="time" id="time"
                        value="{{ old('time', $reservation->hour_reservation) }}">
                    <small id="personHelper" class="">
                        Inserisci l'ora della prenotazione
                    </small>
                </div>

                {{-- contenitore dei bottoni --}}
                <div class="container_btn">

                    {{-- bottone di conferma --}}
                    <button class="btn btn_edit" type="submit" id="btn_edit_reservation">
                        <span>Modifica Prenotazione</span>
                        <i class="ri-calendar-check-fill"></i>
                    </button>

                    {{-- bottone di loading --}}
                    <button class="btn btn_edit" id="btn_loading" style="display: none" disabled>
                        <span>Attendi...</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
