@extends('layouts.admin')

@section('script')
    <script src="{{ asset('js/allergy_validation.js') }}"></script>
@endsection

@section('content')
    <div class="container_allergy">





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
                <a href="#" class="text-decoration-none" style="font-weight: 600; color: hsl(228, 85%, 63%);">
                    Allergie
                </a>
            </li>
        </ul>


        @include('partials.session')

        <div class="container_table_allergy">

            <div class="create_allergies">


                <div class="form_create" id="form_create_allergy">
                    <h2>Creazione Allergia</h2>

                    {{-- parziale per la lista di errori lato back
                    @include('partials.validate') --}}

                    {{-- form per i campi per creare un nuovo viaggio --}}
                    <form action="{{ route('admin.allergy.store') }}" method="post">
                        @csrf
                        @method('POST')

                        {{-- campo name di allergia --}}
                        <div class="mb-3 form-floating">

                            <input onkeyup="hide_name_error()" onblur="check_name()" type="text"
                                class="form-control @error('name') is-invalid @enderror" name="name" id="name"
                                aria-describedby="nameHelper" value="{{ old('name') }}" placeholder="" required />
                            <label for="name" class="form-label">Name *</label>
                            {{-- span di errore lato front --}}
                            <span id="name_error" class="text-danger" role="alert"
                                style="display: none; font-weight: 600;">
                                Il nome deve essere almeno di 3 caratteri e massimo 50 caratteri
                            </span>

                            {{-- errore lato back --}}
                            @error('name')
                                <div id="name_error_back" class="text-danger">{{ $message }}</div>
                            @enderror

                            <small id="nameHelper" class="">
                                Inserisci il nome della allergia
                            </small>

                        </div>



                        <div class="container_button d-flex  pt-2">
                            {{-- bottone di creazione --}}
                            <button id="allergy_btn" class="btn">
                                <span>CREA UN ALLERGIA</span>
                            </button>
                            {{-- bottone di attesa --}}
                            <button id="btn_loading" type="submit" class="btn" style="display: none;" disabled>
                                <span>Attendi ...</span>
                            </button>
                        </div>


                    </form>
                </div>



                <div class="form_modify" id="form_modify_allergy" style="display: block">

                    <h2>Modifica Allergia</h2>

                    {{-- parziale per la lista di errori lato back
                    @include('partials.validate') --}}

                    {{-- form per i campi per creare un nuovo viaggio --}}
                    <form id="modify_update_form" action="{{ route('admin.allergy.update', 2) }}" method="post">
                        @csrf
                        @method('PUT')
                        {{-- campo name di allergia --}}
                        <div class="mb-3 form-floating">

                            <input onkeyup="hide_name_error_modify()" onblur="check_name_modify()" type="text"
                                class="form-control @error('name') is-invalid @enderror" name="name" id="name_modify"
                                aria-describedby="nameHelper" value="{{ old('name') }}" placeholder="" required />
                            <label for="name-modify" class="form-label">Name *</label>
                            {{-- span di errore lato front --}}
                            <span id="name_error_modify" class="text-danger" role="alert"
                                style="display: none; font-weight: 600;">
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

            </div>



            <div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col"
                                style="color: hsl(228, 85%, 63%); background-color: hsla(228, 80%, 4%, 0.3);">#
                            </th>
                            <th scope="col"
                                style="color: hsl(228, 85%, 63%); background-color: hsla(228, 80%, 4%, 0.3);">
                                Name
                            </th>
                            <th scope="col"
                                style="color: hsl(228, 85%, 63%); background-color: hsla(228, 80%, 4%, 0.3);">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>


                        @forelse ($allergies as $allergy)
                            <tr>
                                <td scope="row" style="color: hsl(228, 85%, 63%);">
                                    {{ $allergy->id }}</td>
                                <td style="color: hsl(228, 8%, 56%);"> {{ $allergy->name }} </td>
                                <td>

                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#modalId-{{ $allergy->id }}">
                                        <i class="ri-delete-bin-2-fill"></i>

                                    </button>

                                    <a href="#" class="btn btn_modify"
                                        onclick="showModify('{{ $allergy->name }}', {{ $loop->index }}, {{ $allergy->id }} )">
                                        <i class="ri-edit-2-fill"></i>
                                    </a>

                                    <a href="#" class="btn btn_create_action"
                                        onclick="showModify(false, {{ $loop->index }})">
                                        <i class="ri-add-large-fill"></i>
                                    </a>


                                    <!-- Modal Body -->
                                    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                                    <div class="modal fade" id="modalId-{{ $allergy->id }}" tabindex="-1"
                                        data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                        aria-labelledby="modalTitleId-{{ $allergy->id }}" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered"
                                            role="document">
                                            <div class="modal-content">

                                                {{-- header of modal --}}
                                                <div class="modal-header header_delete">
                                                    <h5 class="modal-title" id="modalTitleId-{{ $allergy->id }}">
                                                        Cancella l'allergia
                                                    </h5>
                                                    <button type="button" class="btn_close" data-bs-dismiss="modal"
                                                        aria-label="Close">
                                                        <i class="ri-close-large-fill"></i>

                                                    </button>
                                                </div>

                                                {{-- body of modal  --}}
                                                <div class="modal-body body_delete">
                                                    <p>
                                                        Sei sicuro di cancellare l'allergia, questo portera alla
                                                        cancellazione
                                                        anche
                                                        dei suo dati presenti.
                                                    </p>

                                                </div>

                                                {{-- footer of modal --}}
                                                <div class="modal-footer footer_delete">
                                                    <form action="{{ route('admin.allergy.destroy', $allergy) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('DELETE')

                                                        {{-- se clicci cancella il viaggio --}}
                                                        <button type="submit" class="btn btn_delete">
                                                            <i class="ri-eraser-fill"></i>
                                                            <span>
                                                                Cancella i Dati
                                                            </span>
                                                        </button>
                                                    </form>
                                                </div>

                                            </div>
                                        </div>
                                    </div>



                                </td>
                            </tr>


                            {{-- <div class="overlay_delete">
                                <div class="container_delete">
    
                                    <div class="header_delete">
                                        <h2>
                                            Cancella l'allergia
                                        </h2>
    
                                        <div class="btn btn_close">
                                            <i class="ri-close-large-fill"></i>
                                        </div>
                                    </div>
                                    <!-- /.header_delete -->
                                    <div class="body_delete">
                                        <p>
    
                                        </p>
                                    </div>
                                    <!-- /.body_delete -->
                                    <div class="footer_delete">
                                        <form action="{{ route('admin.allergy.destroy', $allergy) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn_delete">
    
                                            </button>
                                        </form>
                                    </div>
                                    <!-- /.fotter_delete -->
                                </div>
                            </div> --}}
                        @empty
                            <tr>
                                <td colspan="3">Scusa non ci sono Allergie 😭😭</td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>

                @if ($allergies->count() >= 1)
                    {{ $allergies->links('pagination::bootstrap-5') }}
                @endif

            </div>

        </div>

        {{-- 
        <div class="pagination_new">
            <div data-tooltip="Tooltip 1" class="pagination__dot pagination__dot--active"></div>
            <div data-tooltip="Tooltip 2" class="pagination__dot"></div>
            <div data-tooltip="Tooltip 3" class="pagination__dot"></div>
            <div data-tooltip="Tooltip 4" class="pagination__dot"></div>
            <div data-tooltip="Tooltip 5" class="pagination__dot"></div>

        </div> --}}




    </div>
@endsection
