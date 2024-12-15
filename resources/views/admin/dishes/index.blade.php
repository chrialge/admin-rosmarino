@extends('layouts.admin')

@section('script')
    <script src="{{ asset('js/dish_index.js') }}"></script>
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
                <a href="#" class="text-decoration-none" style="font-weight: 600; color: hsl(228, 85%, 63%);">
                    Menu
                </a>
            </li>
        </ul>

        {{-- title --}}

        <div class="header_page">
            <h2>
                Piatti {{ $count }}
            </h2>

            <a href="{{ route('admin.dishes.create') }}" class="btn btn_create">
                <span> Crea Piatto</span>
                <i class="ri-add-large-fill"></i>
            </a>
        </div>

        @include('partials.session')



        {{-- container degl'antipasti --}}
        <div class="entre_plate_container">

            {{-- header del container --}}
            <div class="header_container" onclick="showPlate(0)">
                <h3>
                    Antipasti {{ $entrePlate->count() }}
                </h3>
                <i class="ri-arrow-down-s-line icon_show_menu"></i>
            </div>

            {{-- separator --}}
            <div class="separator">
            </div>


            {{-- container delle card  --}}
            <div class="container_card">

                @forelse ($entrePlate as $plate)
                    <div class="card_plate">

                        <div class="card_header">
                            @if ($plate->image)
                                <img src="{{ asset('storage/' . $plate->image) }}" alt="image of {{ $plate->name }}">
                            @else
                                <img src="{{ asset('img/pasta.jpg') }}" alt="default image of plate">
                            @endif
                        </div>
                        <div class="card_body">
                            <h5>
                                {{ $plate->name }}
                            </h5>
                            <span>
                                {{ $plate->price . ' ' }}&euro;

                            </span>
                        </div>
                        <div class="card_footer">

                            <button type="button" class="btn btn_delete" data-bs-toggle="modal"
                                data-bs-target="#modalId-delet-{{ $plate->id }}">
                                <i class="ri-delete-bin-2-fill"></i>

                            </button>


                            <!-- Modal Body -->
                            <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                            <div class="modal fade" id="modalId-delet-{{ $plate->id }}" tabindex="-1"
                                data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                aria-labelledby="modalTitleId-delet-{{ $plate->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
                                    <div class="modal-content">

                                        {{-- header of modal --}}
                                        <div class="modal-header header_delete">
                                            <h5 class="modal-title" id="modalTitleId-delet-{{ $plate->id }}">
                                                Cancella Piatto
                                            </h5>
                                            <button type="button" class="btn_close" data-bs-dismiss="modal"
                                                aria-label="Close">
                                                <i class="ri-close-large-fill"></i>

                                            </button>
                                        </div>

                                        {{-- body of modal  --}}
                                        <div class="modal-body body_delete">
                                            <p>
                                                Sei sicuro di cancellare {{ $plate->name }}, questo portera alla
                                                cancellazione
                                                anche
                                                dei suo dati presenti.
                                            </p>

                                        </div>

                                        {{-- footer of modal --}}
                                        <div class="modal-footer footer_delete">
                                            <form action="{{ route('admin.dishes.destroy', $plate) }}" method="post">
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





                            <!-- Modal trigger button -->
                            <button type="button" class="btn btn_show" data-bs-toggle="modal"
                                data-bs-target="#modalId-{{ $plate->id }}">
                                <i class="ri-eye-2-fill"></i>

                            </button>

                            <!-- Modal Body -->
                            <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                            <div class="modal fade" id="modalId-{{ $plate->id }}" tabindex="-1"
                                data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                aria-labelledby="modalTitleId-{{ $plate->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <div class="left_header">
                                                @if ($plate->image)
                                                    <img src="{{ asset('storage/' . $plate->image) }}"
                                                        alt="image of {{ $plate->name }}">
                                                @else
                                                    <img src="{{ asset('img/pasta.jpg') }}" alt="default image of plate">
                                                @endif
                                            </div>


                                            <button type="button" class="btn_close" data-bs-dismiss="modal"
                                                aria-label="Close">
                                                <i class="ri-close-circle-fill"></i>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="name_plate">
                                                <b>Nome: </b>
                                                <span>{{ $plate->name }}</span>
                                            </div>
                                            <div class="typology_plate">
                                                <b>Tipo: </b>
                                                <span>{{ $plate->typology }}</span>
                                            </div>
                                            <div class="price_plate">
                                                <b>Prezzo: </b>
                                                <span>{{ $plate->price }} &euro;</span>
                                            </div>
                                            <div class="allergies_plate">
                                                <b>Allergie: </b>
                                                @if ($plate->allergies()->count() > 0)
                                                    @foreach ($plate->allergies() as $allergy)
                                                        <span class="badge">{{ $allergy }}</span>
                                                    @endforeach
                                                @else
                                                    <span class="badge">N/A</span>
                                                @endif
                                            </div>
                                            <div class="description">
                                                <b>Descrizione: </b>
                                                @if ($plate->description)
                                                    <p>
                                                        {{ $plate->description }}
                                                    </p>
                                                @else
                                                    <p>
                                                        N/A
                                                    </p>
                                                @endif

                                            </div>


                                        </div>

                                    </div>
                                </div>
                            </div>



                            <a class=" btn btn_edit" href="{{ route('admin.dishes.edit', $plate) }}">
                                <i class="ri-edit-fill"></i>
                            </a>
                        </div>
                    </div>
                @empty
                    <h4 style="color: hsl(228, 85%, 63%)">Non hai Antipasti</h4>
                @endforelse

            </div>

        </div>
        <!-- /.entre_plate_container -->

        {{-- conatiner dei primi piatti --}}
        <div class="first_plate_container">

            {{-- header del container --}}
            <div class="header_container" onclick="showPlate(1)">
                <h3>
                    Primi Piatti {{ $firstPlate->count() }}
                </h3>
                <i class="ri-arrow-down-s-line icon_show_menu"></i>
            </div>

            {{-- separator --}}
            <div class="separator">
            </div>



            {{-- container delle card  --}}
            <div class="container_card">

                @forelse ($firstPlate as $plate)
                    <div class="card_plate">

                        <div class="card_header">
                            @if ($plate->image)
                                <img src="{{ asset('storage/' . $plate->image) }}" alt="image of {{ $plate->name }}">
                            @else
                                <img src="{{ asset('img/pasta.jpg') }}" alt="default image of plate">
                            @endif
                        </div>
                        <div class="card_body">
                            <h5>
                                {{ $plate->name }}
                            </h5>
                            <span>
                                {{ $plate->price }}
                            </span>
                        </div>
                        <div class="card_footer">

                            <button type="button" class="btn btn_delete" data-bs-toggle="modal"
                                data-bs-target="#modalId-delet-{{ $plate->id }}">
                                <i class="ri-delete-bin-2-fill"></i>

                            </button>


                            <!-- Modal Body -->
                            <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                            <div class="modal fade" id="modalId-delet-{{ $plate->id }}" tabindex="-1"
                                data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                aria-labelledby="modalTitleId-delet-{{ $plate->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
                                    <div class="modal-content">

                                        {{-- header of modal --}}
                                        <div class="modal-header header_delete">
                                            <h5 class="modal-title" id="modalTitleId-delet-{{ $plate->id }}">
                                                Cancella Piatto
                                            </h5>
                                            <button type="button" class="btn_close" data-bs-dismiss="modal"
                                                aria-label="Close">
                                                <i class="ri-close-large-fill"></i>

                                            </button>
                                        </div>

                                        {{-- body of modal  --}}
                                        <div class="modal-body body_delete">
                                            <p>
                                                Sei sicuro di cancellare {{ $plate->name }}, questo portera alla
                                                cancellazione
                                                anche
                                                dei suo dati presenti.
                                            </p>

                                        </div>

                                        {{-- footer of modal --}}
                                        <div class="modal-footer footer_delete">
                                            <form action="{{ route('admin.dishes.destroy', $plate) }}" method="post">
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


                            <button type="button" class="btn btn_show" data-bs-toggle="modal"
                                data-bs-target="#modalId-{{ $plate->id }}">
                                <i class="ri-eye-2-fill"></i>

                            </button>

                            <!-- Modal Body -->
                            <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                            <div class="modal fade" id="modalId-{{ $plate->id }}" tabindex="-1"
                                data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                aria-labelledby="modalTitleId-{{ $plate->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <div class="left_header">
                                                @if ($plate->image)
                                                    <img src="{{ asset('storage/' . $plate->image) }}"
                                                        alt="image of {{ $plate->name }}">
                                                @else
                                                    <img src="{{ asset('img/pasta.jpg') }}" alt="default image of plate">
                                                @endif
                                            </div>


                                            <button type="button" class="btn_close" data-bs-dismiss="modal"
                                                aria-label="Close">
                                                <i class="ri-close-circle-fill"></i>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="name_plate">
                                                <b>Nome: </b>
                                                <span>{{ $plate->name }}</span>
                                            </div>
                                            <div class="typology_plate">
                                                <b>Tipo: </b>
                                                <span>{{ $plate->typology }}</span>
                                            </div>
                                            <div class="price_plate">
                                                <b>Prezzo: </b>
                                                <span>{{ $plate->price }} &euro;</span>
                                            </div>
                                            <div class="allergies_plate">
                                                <b>Allergie: </b>
                                                @if ($plate->allergies()->count() > 0)
                                                    @foreach ($plate->allergies() as $allergy)
                                                        <span class="badge">{{ $allergy }}</span>
                                                    @endforeach
                                                @else
                                                    <span class="badge">N/A</span>
                                                @endif
                                            </div>
                                            <div class="description">
                                                <b>Descrizione: </b>
                                                @if ($plate->description)
                                                    <p>
                                                        {{ $plate->description }}
                                                    </p>
                                                @else
                                                    <p>
                                                        N/A
                                                    </p>
                                                @endif

                                            </div>


                                        </div>

                                    </div>
                                </div>
                            </div>

                            <a class=" btn btn_edit" href="{{ route('admin.dishes.edit', $plate) }}">
                                <i class="ri-edit-fill"></i>
                            </a>

                        </div>
                    </div>
                @empty
                    <h4 style="color: hsl(228, 85%, 63%)">Non hai primi piatti</h4>
                @endforelse
            </div>

        </div>

        {{-- container dei piatti secondi --}}
        <div class="second_plate_container">

            {{-- header del container --}}
            <div class="header_container" onclick="showPlate(2)">
                <h3>
                    Secondi Piatti {{ $secondPlate->count() }}
                </h3>
                <i class="ri-arrow-down-s-line icon_show_menu"></i>
            </div>

            {{-- separator --}}
            <div class="separator">
            </div>

            {{-- container delle card  --}}
            <div class="container_card">

                @forelse ($secondPlate as $plate)
                    <div class="card_plate">

                        <div class="card_header">
                            @if ($plate->image)
                                <img src="{{ asset('storage/' . $plate->image) }}" alt="image of {{ $plate->name }}">
                            @else
                                <img src="{{ asset('img/pasta.jpg') }}" alt="default image of plate">
                            @endif
                        </div>
                        <div class="card_body">
                            <h5>
                                {{ $plate->name }}
                            </h5>
                            <span>
                                {{ $plate->price }}
                            </span>
                        </div>
                        <div class="card_footer">

                            <button type="button" class="btn btn_delete" data-bs-toggle="modal"
                                data-bs-target="#modalId-delet-{{ $plate->id }}">
                                <i class="ri-delete-bin-2-fill"></i>

                            </button>


                            <!-- Modal Body -->
                            <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                            <div class="modal fade" id="modalId-delet-{{ $plate->id }}" tabindex="-1"
                                data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                aria-labelledby="modalTitleId-delet-{{ $plate->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
                                    <div class="modal-content">

                                        {{-- header of modal --}}
                                        <div class="modal-header header_delete">
                                            <h5 class="modal-title" id="modalTitleId-delet-{{ $plate->id }}">
                                                Cancella Piatto
                                            </h5>
                                            <button type="button" class="btn_close" data-bs-dismiss="modal"
                                                aria-label="Close">
                                                <i class="ri-close-large-fill"></i>

                                            </button>
                                        </div>

                                        {{-- body of modal  --}}
                                        <div class="modal-body body_delete">
                                            <p>
                                                Sei sicuro di cancellare {{ $plate->name }}, questo portera alla
                                                cancellazione
                                                anche
                                                dei suo dati presenti.
                                            </p>

                                        </div>

                                        {{-- footer of modal --}}
                                        <div class="modal-footer footer_delete">
                                            <form action="{{ route('admin.dishes.destroy', $plate) }}" method="post">
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


                            <button type="button" class="btn btn_show" data-bs-toggle="modal"
                                data-bs-target="#modalId-{{ $plate->id }}">
                                <i class="ri-eye-2-fill"></i>

                            </button>

                            <!-- Modal Body -->
                            <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                            <div class="modal fade" id="modalId-{{ $plate->id }}" tabindex="-1"
                                data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                aria-labelledby="modalTitleId-{{ $plate->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <div class="left_header">
                                                @if ($plate->image)
                                                    <img src="{{ asset('storage/' . $plate->image) }}"
                                                        alt="image of {{ $plate->name }}">
                                                @else
                                                    <img src="{{ asset('img/pasta.jpg') }}" alt="default image of plate">
                                                @endif
                                            </div>


                                            <button type="button" class="btn_close" data-bs-dismiss="modal"
                                                aria-label="Close">
                                                <i class="ri-close-circle-fill"></i>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="name_plate">
                                                <b>Nome: </b>
                                                <span>{{ $plate->name }}</span>
                                            </div>
                                            <div class="typology_plate">
                                                <b>Tipo: </b>
                                                <span>{{ $plate->typology }}</span>
                                            </div>
                                            <div class="price_plate">
                                                <b>Prezzo: </b>
                                                <span>{{ $plate->price }} &euro;</span>
                                            </div>
                                            <div class="allergies_plate">
                                                <b>Allergie: </b>
                                                @if ($plate->allergies()->count() > 0)
                                                    @foreach ($plate->allergies() as $allergy)
                                                        <span class="badge">{{ $allergy }}</span>
                                                    @endforeach
                                                @else
                                                    <span class="badge">N/A</span>
                                                @endif
                                            </div>
                                            <div class="description">
                                                <b>Descrizione: </b>
                                                @if ($plate->description)
                                                    <p>
                                                        {{ $plate->description }}
                                                    </p>
                                                @else
                                                    <p>
                                                        N/A
                                                    </p>
                                                @endif

                                            </div>


                                        </div>

                                    </div>
                                </div>
                            </div>

                            <a class=" btn btn_edit" href="{{ route('admin.dishes.edit', $plate) }}">
                                <i class="ri-edit-fill"></i>
                            </a>
                        </div>
                    </div>
                @empty
                    <h4 style="color: hsl(228, 85%, 63%)">Non hai secondi piatti</h4>
                @endforelse
            </div>

        </div>
        <!-- /.second_plate_container -->

        {{-- container dessert --}}
        <div class="dessert_plate_container">

            {{-- header del container --}}
            <div class="header_container" onclick="showPlate(3)">
                <h3>
                    Dessert {{ $dessertPlate->count() }}
                </h3>
                <i class="ri-arrow-down-s-line icon_show_menu"></i>
            </div>

            {{-- separator --}}
            <div class="separator">
            </div>

            {{-- container delle card  --}}
            <div class="container_card">

                @forelse ($dessertPlate as $plate)
                    <div class="card_plate">

                        <div class="card_header">
                            @if ($plate->image)
                                <img src="{{ asset('storage/' . $plate->image) }}" alt="image of {{ $plate->name }}">
                            @else
                                <img src="{{ asset('img/pasta.jpg') }}" alt="default image of plate">
                            @endif
                        </div>
                        <div class="card_body">
                            <h5>
                                {{ $plate->name }}
                            </h5>
                            <span>
                                {{ $plate->price }}
                            </span>
                        </div>
                        <div class="card_footer">

                            <button type="button" class="btn btn_delete" data-bs-toggle="modal"
                                data-bs-target="#modalId-delet-{{ $plate->id }}">
                                <i class="ri-delete-bin-2-fill"></i>

                            </button>


                            <!-- Modal Body -->
                            <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                            <div class="modal fade" id="modalId-delet-{{ $plate->id }}" tabindex="-1"
                                data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                aria-labelledby="modalTitleId-delet-{{ $plate->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
                                    <div class="modal-content">

                                        {{-- header of modal --}}
                                        <div class="modal-header header_delete">
                                            <h5 class="modal-title" id="modalTitleId-delet-{{ $plate->id }}">
                                                Cancella Piatto
                                            </h5>
                                            <button type="button" class="btn_close" data-bs-dismiss="modal"
                                                aria-label="Close">
                                                <i class="ri-close-large-fill"></i>

                                            </button>
                                        </div>

                                        {{-- body of modal  --}}
                                        <div class="modal-body body_delete">
                                            <p>
                                                Sei sicuro di cancellare {{ $plate->name }}, questo portera alla
                                                cancellazione
                                                anche
                                                dei suo dati presenti.
                                            </p>

                                        </div>

                                        {{-- footer of modal --}}
                                        <div class="modal-footer footer_delete">
                                            <form action="{{ route('admin.dishes.destroy', $plate) }}" method="post">
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

                            <button type="button" class="btn btn_show" data-bs-toggle="modal"
                                data-bs-target="#modalId-{{ $plate->id }}">
                                <i class="ri-eye-2-fill"></i>

                            </button>

                            <!-- Modal Body -->
                            <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                            <div class="modal fade" id="modalId-{{ $plate->id }}" tabindex="-1"
                                data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                aria-labelledby="modalTitleId-{{ $plate->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <div class="left_header">
                                                @if ($plate->image)
                                                    <img src="{{ asset('storage/' . $plate->image) }}"
                                                        alt="image of {{ $plate->name }}">
                                                @else
                                                    <img src="{{ asset('img/pasta.jpg') }}" alt="default image of plate">
                                                @endif
                                            </div>


                                            <button type="button" class="btn_close" data-bs-dismiss="modal"
                                                aria-label="Close">
                                                <i class="ri-close-circle-fill"></i>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="name_plate">
                                                <b>Nome: </b>
                                                <span>{{ $plate->name }}</span>
                                            </div>
                                            <div class="typology_plate">
                                                <b>Tipo: </b>
                                                <span>{{ $plate->typology }}</span>
                                            </div>
                                            <div class="price_plate">
                                                <b>Prezzo: </b>
                                                <span>{{ $plate->price }} &euro;</span>
                                            </div>
                                            <div class="allergies_plate">
                                                <b>Allergie: </b>
                                                @if ($plate->allergies()->count() > 0)
                                                    @foreach ($plate->allergies() as $allergy)
                                                        <span class="badge">{{ $allergy }}</span>
                                                    @endforeach
                                                @else
                                                    <span class="badge">N/A</span>
                                                @endif
                                            </div>
                                            <div class="description">
                                                <b>Descrizione: </b>
                                                @if ($plate->description)
                                                    <p>
                                                        {{ $plate->description }}
                                                    </p>
                                                @else
                                                    <p>
                                                        N/A
                                                    </p>
                                                @endif

                                            </div>


                                        </div>

                                    </div>
                                </div>
                            </div>

                            <a class=" btn btn_edit" href="{{ route('admin.dishes.edit', $plate) }}">
                                <i class="ri-edit-fill"></i>
                            </a>
                        </div>
                    </div>
                @empty
                    <h4 style="color: hsl(228, 85%, 63%)">Non hai Dessert</h4>
                @endforelse
            </div>

        </div>
        <!-- /.dessert_plate_container -->

        {{-- container drink --}}
        <div class="drink_container">
            {{-- header del container --}}
            <div class="header_container" onclick="showPlate(4)">
                <h3>
                    Bevande {{ $drinks->count() }}
                </h3>
                <i class="ri-arrow-down-s-line icon_show_menu"></i>
            </div>

            {{-- separator --}}
            <div class="separator">
            </div>


            {{-- container delle card  --}}
            <div class="container_card">

                @forelse ($drinks as $plate)
                    <div class="card_plate">

                        <div class="card_header">
                            @if ($plate->image)
                                <img src="{{ asset('storage/' . $plate->image) }}" alt="image of {{ $plate->name }}">
                            @else
                                <img src="{{ asset('img/pasta.jpg') }}" alt="default image of plate">
                            @endif
                        </div>
                        <div class="card_body">
                            <h5>
                                {{ $plate->name }}
                            </h5>
                            <span>
                                {{ $plate->price }}
                            </span>
                        </div>
                        <div class="card_footer">

                            <button type="button" class="btn btn_delete" data-bs-toggle="modal"
                                data-bs-target="#modalId-delet-{{ $plate->id }}">
                                <i class="ri-delete-bin-2-fill"></i>

                            </button>


                            <!-- Modal Body -->
                            <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                            <div class="modal fade" id="modalId-delet-{{ $plate->id }}" tabindex="-1"
                                data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                aria-labelledby="modalTitleId-delet-{{ $plate->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
                                    <div class="modal-content">

                                        {{-- header of modal --}}
                                        <div class="modal-header header_delete">
                                            <h5 class="modal-title" id="modalTitleId-delet-{{ $plate->id }}">
                                                Cancella Piatto
                                            </h5>
                                            <button type="button" class="btn_close" data-bs-dismiss="modal"
                                                aria-label="Close">
                                                <i class="ri-close-large-fill"></i>

                                            </button>
                                        </div>

                                        {{-- body of modal  --}}
                                        <div class="modal-body body_delete">
                                            <p>
                                                Sei sicuro di cancellare {{ $plate->name }}, questo portera alla
                                                cancellazione
                                                anche
                                                dei suo dati presenti.
                                            </p>

                                        </div>

                                        {{-- footer of modal --}}
                                        <div class="modal-footer footer_delete">
                                            <form action="{{ route('admin.dishes.destroy', $plate) }}" method="post">
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

                            <button type="button" class="btn btn_show" data-bs-toggle="modal"
                                data-bs-target="#modalId-{{ $plate->id }}">
                                <i class="ri-eye-2-fill"></i>

                            </button>

                            <!-- Modal Body -->
                            <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                            <div class="modal fade" id="modalId-{{ $plate->id }}" tabindex="-1"
                                data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                aria-labelledby="modalTitleId-{{ $plate->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <div class="left_header">
                                                @if ($plate->image)
                                                    <img src="{{ asset('storage/' . $plate->image) }}"
                                                        alt="image of {{ $plate->name }}">
                                                @else
                                                    <img src="{{ asset('img/pasta.jpg') }}"
                                                        alt="default image of plate">
                                                @endif
                                            </div>


                                            <button type="button" class="btn_close" data-bs-dismiss="modal"
                                                aria-label="Close">
                                                <i class="ri-close-circle-fill"></i>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="name_plate">
                                                <b>Nome: </b>
                                                <span>{{ $plate->name }}</span>
                                            </div>
                                            <div class="typology_plate">
                                                <b>Tipo: </b>
                                                <span>{{ $plate->typology }}</span>
                                            </div>
                                            <div class="price_plate">
                                                <b>Prezzo: </b>
                                                <span>{{ $plate->price }} &euro;</span>
                                            </div>
                                            <div class="allergies_plate">
                                                <b>Allergie: </b>
                                                @if ($plate->allergies()->count() > 0)
                                                    @foreach ($plate->allergies() as $allergy)
                                                        <span class="badge">{{ $allergy }}</span>
                                                    @endforeach
                                                @else
                                                    <span class="badge">N/A</span>
                                                @endif
                                            </div>
                                            <div class="description">
                                                <b>Descrizione: </b>
                                                @if ($plate->description)
                                                    <p>
                                                        {{ $plate->description }}
                                                    </p>
                                                @else
                                                    <p>
                                                        N/A
                                                    </p>
                                                @endif

                                            </div>


                                        </div>

                                    </div>
                                </div>
                            </div>




                            <a class=" btn btn_edit" href="{{ route('admin.dishes.edit', $plate) }}">
                                <i class="ri-edit-fill"></i>
                            </a>
                        </div>
                    </div>
                @empty
                    <h4 style="color: hsl(228, 85%, 63%)">Non hai Bevande</h4>
                @endforelse
            </div>

        </div>
        <!-- /.drink_plate -->

    </div>
@endsection
