@extends('layouts.admin')

@section('script')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    @vite(['resources/js/calendar.js'])
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
                <a href="{{ route('admin.allergy.index') }}" style="font-weight: 600; color: hsl(228, 8%, 56%);">
                    Menu
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

        <div class="header_page_edit g-1">
            <h2>
                Modifica di: {{ $reservation->customer_name }}
            </h2>

            <a href="{{ route('admin.dishes.index') }}" class="btn btn_return">
                <span>Indietro</span>
                <i class="ri-arrow-left-circle-line"></i>
            </a>
        </div>

        <div class="container_form_modify">

            {{-- campo name del prenotato --}}
            <div class="mb-3 form-floating">

                <input type="text" class="form-control @error('customer_name') is-invalid @enderror" name="customer_name"
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
            <div class="mb-3 form-floating">

                <input type="text" class="form-control @error('customer_last_name') is-invalid @enderror"
                    name="customer_last_name" id="customer_last_name" aria-describedby="customerLastNameHelper"
                    value="{{ old('customer_last_name', $reservation->customer_last_name) }}" placeholder="" required />
                <label for="customer_last_name" class="form-label">Cognome *</label>
                {{-- span di errore lato front --}}
                <span id="name_error" class="text-danger" role="alert" style="display: none; font-weight: 600;">
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

            {{-- campo cognome del prenotato --}}
            <div class="mb-3 form-floating">

                <input type="email" class="form-control @error('customer_email') is-invalid @enderror"
                    name="customer_email" id="customer_email" aria-describedby="customerEmailHelper"
                    value="{{ old('customer_email', $reservation->customer_email) }}" placeholder="" required />
                <label for="customer_email" class="form-label">Email *</label>
                {{-- span di errore lato front --}}
                <span id="name_error" class="text-danger" role="alert" style="display: none; font-weight: 600;">
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

            <div class="mb-3 form-floating">

                <input type="number" class="form-control @error('customer_telephone') is-invalid @enderror"
                    name="customer_telephone" id="customer_telephone" aria-describedby="customerTelephoneHelper"
                    value="{{ old('customer_telephone', $reservation->customer_telephone) }}" placeholder="" required />
                <label for="customer_telephone" class="form-label">Telefono *</label>
                {{-- span di errore lato front --}}
                <span id="name_error" class="text-danger" role="alert" style="display: none; font-weight: 600;">
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


            <div class="mb-3 form-floating">

                <input type="number" class="form-control @error('customer_telephone') is-invalid @enderror"
                    name="customer_telephone" id="customer_telephone" aria-describedby="personHelper"
                    value="{{ old('customer_telephone', $reservation->person) }}" placeholder="" required />
                <label for="customer_telephone" class="form-label">Persone *</label>
                {{-- span di errore lato front --}}
                <span id="name_error" class="text-danger" role="alert" style="display: none; font-weight: 600;">
                    Il numero di persone e obbligatio
                </span>

                {{-- errore lato back --}}
                @error('customer_telephone')
                    <div id="name_error_back" class="text-danger">{{ $message }}</div>
                @enderror

                <small id="personHelper" class="">
                    Inserisci il numero di persone della prenotazione
                </small>

            </div>

            <div class="mb-3">
                <input type="date" class="date" id="date" name="date"
                    value="{{ old('date', $reservation->date) }}">
            </div>

            <div class="mb-3">
                <input type="time" name="time" id="time"
                    value="{{ old('time', $reservation->hour_reservation) }}">
            </div>


            <button class="btn btn_edit" type="submit" id="btn_edit_plate" onsubmit="check_validation(event);">
                <span>Modifica Prenotazione</span>
                <i class="ri-bowl-fill"></i>
            </button>
            <button class="btn btn_edit" type="submit" id="btn_loading" style="display: none">
                <span>Attendi...</span>

            </button>




        </div>



    </div>
@endsection
