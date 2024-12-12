<div class="form_modify" id="form_modify_allergy">

    <h2>Modifica Allergia</h2>

    {{-- parziale per la lista di errori lato back
    @include('partials.validate') --}}

    {{-- form per i campi per creare un nuovo viaggio --}}
    <form action="{{ route('admin.allergy.update') }}" method="post">
        @csrf

        {{-- campo name di allergia --}}
        <div class="mb-3 form-floating">

            <input onkeyup="hide_name_error_modify()" onblur="check_name_modify()" type="text"
                class="form-control @error('name') is-invalid @enderror" name="name" id="name_modify"
                aria-describedby="nameHelper" value="{{ old('name') }}" placeholder="" required />
            <label for="name-modify" class="form-label">Name *</label>
            {{-- span di errore lato front --}}
            <span id="name_error_modify" class="text-danger" role="alert" style="display: none; font-weight: 600;">
                Il nome deve essere almeno di 3 caratteri e massimo 50 caratteri
            </span>

            {{-- errore lato back --}}
            @error('name')
                <div id="name_error_back_modify" class="text-danger">{{ $message }}</div>
            @enderror

            <small id="nameHelper" class="">
                Inserisci il nome della allergia
            </small>

        </div>



        <div class="container_button d-flex  pt-2">
            {{-- bottone di creazione --}}
            <button id="allergy_btn_modify" class="btn">
                <span>MODIFICA UN ALLERGIA</span>
            </button>
            {{-- bottone di attesa --}}
            <button id="btn_loading_modify" type="submit" class="btn" style="display: none;" disabled>
                <span>Attendi ...</span>
            </button>
        </div>


    </form>

</div>
