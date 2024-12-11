@extends('layouts.admin')

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
        <div class="container_table_allergy">

            <div class="create_allergies">

                <h2>Creazione Allergia</h2>

                {{-- parziale per la lista di errori lato back
                @include('partials.validate') --}}

                {{-- form per i campi per creare un nuovo viaggio --}}
                <form action="{{ route('admin.allergy.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    {{-- campo name di travel --}}
                    <div class="mb-3 form-floating">

                        <input onkeyup="hide_name_error()" onblur="check_name()" type="text"
                            class="form-control @error('name') is-invalid @enderror" name="name" id="name"
                            aria-describedby="nameHelper" value="{{ old('name') }}" placeholder="" required />
                        <label for="name" class="form-label">Name *</label>
                        <small id="nameHelper" class="">
                            Inserisci il nome della allergia
                        </small>

                        {{-- span di errore lato front 
                        <span id="name_error" class="text-danger error_invisible" role="alert">
                            Il nome deve essere almeno di 3 caratteri e massimo 50 caratteri
                        </span> --}}

                        {{-- errore lato back --}}
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror

                    </div>



                    <div class="container_button d-flex  pt-2">
                        {{-- bottone di creazione --}}
                        <button id="travel_btn" type="submit" class="btn btn-primary">
                            <span>CREA UN VIAGGIO</span>
                        </button>
                        {{-- bottone di attesa
                        <button id="btn_loading" type="submit" class="btn btn-primary error_invisible" disabled>
                            <span>Attendi ...</span>
                        </button> --}}
                    </div>


                </form>


            </div>


            <table class="table">
                <thead>
                    <tr>
                        <th scope="col" style="color: hsl(228, 85%, 63%); background-color: hsla(228, 80%, 4%, 0.3);">#
                        </th>
                        <th scope="col" style="color: hsl(228, 85%, 63%); background-color: hsla(228, 80%, 4%, 0.3);">
                            Name
                        </th>
                        <th scope="col" style="color: hsl(228, 85%, 63%); background-color: hsla(228, 80%, 4%, 0.3);">
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
                                <a href="#" class="btn btn-danger">
                                    <i class="ri-delete-bin-2-fill"></i>
                                </a>

                                <a href="#" class="btn btn-warning">
                                    <i class="ri-edit-2-fill"></i>
                                </a>

                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3">Scusa non ci sono Allergie 😭😭</td>
                        </tr>
                    @endforelse

                </tbody>
            </table>

        </div>







    </div>
@endsection
