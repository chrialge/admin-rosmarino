@extends('layouts.admin')


@section('script')
    {{-- javascript della pagina --}}
    <script src="{{ asset('js/edit_dish_validation.js') }}"></script>



    <!-- Styles di multiselect -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
    <!-- Or for RTL support -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.rtl.min.css" />

    <!-- Scripts  di multiselect-->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>
@endsection


@section('content')
    <div class="container-dish">

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
                <a href="{{ route('admin.dishes.index') }}" style="font-weight: 600; color: hsl(228, 8%, 56%);">
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

        {{-- header page --}}
        <div class="header_page_edit g-1">
            <h2>
                Modifica di: {{ $dish->name }}
            </h2>

            {{-- bottone che cliccando porta alla pagina precednte --}}
            <a href="{{ route('admin.dishes.index') }}" class="btn btn_return">
                <span>Indietro</span>
                <i class="ri-arrow-left-circle-line"></i>
            </a>
        </div>

        {{-- container del form --}}
        <div class="container_form_edit_plate">

            {{-- form di modifica del piatto --}}
            <form action="{{ route('admin.dishes.update', $dish) }}" method="post" enctype="multipart/form-data"
                onsubmit="check_validation(event)">
                @csrf
                @method('PUT')

                {{-- campo name di piatto --}}
                <div class="mb-3 form-floating">

                    <input type="text" onkeyup="hide_error_name()" onblur="check_name()"
                        class="form-control @error('name') is-invalid @enderror" name="name" id="name"
                        aria-describedby="nameHelper" value="{{ old('name', $dish->name) }}" placeholder="" required />
                    <label for="name" class="form-label">Name *</label>

                    {{-- span di errore lato front --}}
                    <span id="name_error" class="text-danger" role="alert" style="display: none; font-weight: 600;">
                        Il nome deve essere almeno di 3 caratteri e massimo 50 caratteri
                    </span>

                    {{-- errore lato back --}}
                    @error('name')
                        <div id="name_error_back" class="text-danger">{{ $message }}</div>
                    @enderror

                    <small id="nameHelper" class="">
                        Inserisci il nome del piatto
                    </small>

                </div>

                {{-- campo prezzo del piatto --}}
                <div class="mb-3 form-floating">

                    <input type="number" min="0.01" max="9999.99" step="0.01" onkeyup="hide_error_price()"
                        onblur="check_price()" class="form-control @error('price') is-invalid @enderror" name="price"
                        id="price" aria-describedby="priceHelper" value="{{ old('price', $dish->price) }}"
                        placeholder="" required />
                    <label for="price" class="form-label">Prezzo * </label>

                    {{-- span di errore lato front --}}
                    <span id="price_error" class="text-danger" role="alert" style="display: none; font-weight: 600;">
                        Il prezzo massimo di 9999.99 e minimo 0.01
                    </span>

                    {{-- errore lato back --}}
                    @error('price')
                        <div id="price_error_back" class="text-danger">{{ $message }}</div>
                    @enderror

                    <small id="priceHelper" class="">
                        Inserisci il prezzo del piatto
                    </small>

                </div>

                {{-- campo di upload dell'imagine --}}
                <div class="input-group mb-3">
                    <div class="custom-file">
                        <input type="file" class="image" id="image" name="image">
                    </div>
                </div>

                {{-- campo tipologia del piatto --}}
                <div class="mb-3 form-floating">

                    <select class="form-select @error('typology') is-invalid @enderror" onblur="check_typology()"
                        onkeyup="hide_error_typology()" aria-label="type of plate" name="typology"
                        aria-describedby="typologyHelper" id="typology">
                        <option disabled>Seleziona il tipo *</option>
                        <option value="antipasto" {{ old('typology', $dish->typology) === 'antipasto' ? 'selected' : '' }}>
                            Antipasto</option>
                        <option value="primo" {{ old('typology', $dish->typology) === 'primo' ? 'selected' : '' }}>Primo
                        </option>
                        <option value="secondo" {{ old('typology', $dish->typology) === 'secondo' ? 'selected' : '' }}>
                            Secondo</option>
                        <option value="dessert" {{ old('typology', $dish->typology) === 'dessert' ? 'selected' : '' }}>
                            Dessert</option>
                        <option value="bevande" {{ old('typology', $dish->typology) === 'bevande' ? 'selected' : '' }}>
                            Bevande</option>
                    </select>
                    <span id="typology_error" class="text-danger" role="alert" style="display: none; font-weight: 600;">
                        Devi almeno sceglierne uno.
                    </span>

                    {{-- errore lato back --}}
                    @error('typology')
                        <div id="name_error_back_modify" class="text-danger">{{ $message }}</div>
                    @enderror

                    <small id="typologyHelper" class="">
                        Inserisci la tipologia
                    </small>

                </div>



                {{-- campo delle allergie --}}
                <div class="mb-3 form-floating">

                    <select class="form-select" name="allergies[]" id="multiple-select-field"
                        data-placeholder="Choose anything" multiple>
                        @foreach ($allergies as $allergy)
                            <option value="{{ $allergy->id }}"
                                {{ in_array($allergy->id, old('allergies', $array)) ? 'selected' : '' }}>
                                {{ $allergy->name }}</option>
                        @endforeach

                    </select>

                    <small id="typologyHelper" class="">
                        Inserisci le allergie
                    </small>

                </div>

                {{-- descrizione del piatto --}}
                <div class="mb-3 form-floating">
                    <textarea name="description" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2"
                        style="height: 100px">{{ old('description', $dish->description) }}</textarea>
                    <label for="floatingTextarea2">Descrizione</label>
                </div>

                {{-- bottone di conferma --}}
                <button class="btn btn_edit" type="submit" id="btn_edit_plate">
                    <span>Modifica Piatto</span>
                    <i class="ri-bowl-fill"></i>
                </button>

                {{-- bottone di loading --}}
                <button class="btn btn_edit" id="btn_loading" style="display: none" disabled>
                    <span>Attendi...</span>
                </button>
            </form>
        </div>
    </div>

    <script>
        $('#multiple-select-field').select2({
            theme: "bootstrap-5",
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
            placeholder: $(this).data('placeholder'),
            closeOnSelect: false,
        });
    </script>
@endsection
