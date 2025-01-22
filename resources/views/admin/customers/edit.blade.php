@extends('layouts.admin')

@section('script')
    <script src="{{ asset('js/edit_reservation_customer_validation.js') }}"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    @vite(['resources/js/calendar_customer.js'])
    @vite(['resources/scss/edit-reservation.scss'])
@endsection


@section('content')
    <div class="container-customers">

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
                <a href="{{ route('admin.customers.index') }}" style="font-weight: 600; color: hsl(228, 8%, 56%);">
                    Clienti
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

        {{-- header page --}}
        <div class="header_page_edit g-1">

            {{-- titolo --}}
            <h2>
                Modifica di: {{ $customer->name }}
            </h2>

            {{-- bottone che rimanda alla pagina precedente --}}
            <a href="{{ route('admin.customers.index') }}" class="btn_return">
                <span>Indietro</span>
                <i class="ri-arrow-left-circle-line"></i>
            </a>
        </div>

        {{-- contenitore del form --}}
        <div class="container_form_modify">

            {{-- form --}}
            <form action="{{ route('admin.customers.update', $customer) }}" method="post"
                onsubmit="check_validation_customer(event);">
                @csrf
                @method('PUT')

                {{-- campo name del cliente --}}
                <div class=" form-floating">

                    <input type="text" onkeyup="hide_name_error()" onblur="check_name()"
                        class="form-control @error('name') is-invalid @enderror" name="name" id="customer_name"
                        aria-describedby="customerNameHelper" value="{{ old('name', $customer->name) }}" placeholder=""
                        required />
                    <label for="name" class="form-label">Nome *</label>

                    {{-- span di errore lato front --}}
                    <span id="name_error" class="text-danger" role="alert" style="display: none; font-weight: 600;">
                        Il nome deve essere almeno di 3 caratteri e massimo 100 caratteri
                    </span>

                    {{-- errore lato back --}}
                    @error('name')
                        <div id="name_error_back" class="text-danger">{{ $message }}</div>
                    @enderror

                    <small id="customerNameHelper" class="">
                        Inserisci il nome del prenotato
                    </small>
                </div>

                {{-- campo cognome del cliente --}}
                <div class=" form-floating">
                    <input type="text" onkeyup="hide_last_name_error()" onblur="check_last_name()"
                        class="form-control @error('last_name') is-invalid @enderror" name="last_name"
                        id="customer_last_name" aria-describedby="customerLastNameHelper"
                        value="{{ old('last_name', $customer->last_name) }}" placeholder="" required />
                    <label for="last_name" class="form-label">Cognome *</label>

                    {{-- span di errore lato front --}}
                    <span id="last_name_error" class="text-danger" role="alert" style="display: none; font-weight: 600;">
                        Il cognome deve essere almeno di 3 caratteri e massimo 100 caratteri
                    </span>

                    {{-- errore lato back --}}
                    @error('last_name')
                        <div id="name_error_back" class="text-danger">{{ $message }}</div>
                    @enderror

                    <small id="customerLastNameHelper" class="">
                        Inserisci il cognome del prenotato
                    </small>

                </div>

                {{-- campo email del cliente --}}
                <div class=" form-floating">
                    <input type="email" onkeyup="hide_email_error()" onblur="check_email()"
                        class="form-control @error('email') is-invalid @enderror" name="email" id="customer_email"
                        aria-describedby="customerEmailHelper" value="{{ old('email', $customer->email) }}" placeholder=""
                        required />
                    <label for="email" class="form-label">Email *</label>

                    {{-- span di errore lato front --}}
                    <span id="email_error" class="text-danger" role="alert" style="display: none; font-weight: 600;">
                        L'email deve essere corretta
                    </span>

                    {{-- errore lato back --}}
                    @error('email')
                        <div id="name_error_back" class="text-danger">{{ $message }}</div>
                    @enderror

                    <small id="customerEmailHelper" class="">
                        Inserisci l'email del prenotato
                    </small>

                </div>

                {{-- campo numero di telefono --}}
                <div class=" form-floating">
                    <input type="number" onkeyup="hide_telephone_error()" onblur="check_telephone()"
                        class="form-control @error('telephone') is-invalid @enderror" name="telephone"
                        id="customer_telephone" aria-describedby="customerTelephoneHelper"
                        value="{{ old('telephone', $customer->telephone) }}" placeholder="" />
                    <label for="telephone" class="form-label">Telefono</label>

                    {{-- span di errore lato front --}}
                    <span id="telephone_error" class="text-danger" role="alert" style="display: none; font-weight: 600;">
                        Il numero di telefono e di sole cifre
                    </span>

                    {{-- errore lato back --}}
                    @error('telephone')
                        <div id="name_error_back" class="text-danger">{{ $message }}</div>
                    @enderror

                    <small id="customerTelephoneHelper" class="">
                        Inserisci il numero del prenotato
                    </small>

                </div>

                {{-- campo di data di nascita --}}
                <div class=" form_data_time">
                    <input type="date" class="date" id="date" name="birth_day"
                        value="{{ old('date', $customer->birth_day) }}" onblur="check_birty_day()">

                    {{-- span di errore lato front --}}
                    <span id="birty_day_error" class="text-danger" role="alert"
                        style="display: none; font-weight: 600;">
                        La data di nascita è obbligatoria
                    </span>

                    <small id="personHelper" class="">
                        Inserisci la data della prenotazione
                    </small>
                </div>


                {{-- contenitore dei bottoni --}}
                <div class="container_btn">

                    {{-- bottone di conferma --}}
                    <button class="btn btn_edit" type="submit" id="btn_edit_customer">
                        <span>Modifica cliente</span>
                        <i class="ri-file-user-fill"></i>
                    </button>

                    {{-- bottone di loading --}}
                    <button class="btn btn_edit" type="submit" id="btn_loading" style="display: none" disabled>
                        <span>Attendi...</span>
                    </button>
                </div>


            </form>






        </div>



    </div>
@endsection
