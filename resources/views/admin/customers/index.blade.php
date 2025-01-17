@extends('layouts.admin')

@section('script')
    <script src="{{ asset('js/reservation_index.js') }}"></script>
@endsection


@section('content')
    <div class="container_customers">
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
                    Clienti
                </a>
            </li>
        </ul>

        <div class="header_page_customer">
            <h2>
                Clienti {{ $customers->count() }}
            </h2>





            <!-- Modal trigger button -->
            <button id="send_email" type="button" class="btn_send_email btn" onclick="showCheckBox(event)"
                data-bs-toggle="modal" data-bs-target="#modalId-send-email" style="display: none">
                <span>
                    Invia email
                </span>
                <i class="ri-mail-send-fill"></i>
            </button>

            <!-- Modal Body -->
            <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
            <div class="modal fade" id="modalId-send-email" tabindex="-1" data-bs-backdrop="static"
                data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId-send-email" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered " role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title" id="modalTitleId-send-email">
                                Email
                            </h3>
                            <button type="button" class="" data-bs-dismiss="modal" aria-label="Close">
                                <i class="ri-mail-close-fill"></i>
                            </button>
                        </div>
                        <div class="modal-body">

                            @include('partials.validate')

                            <form action="{{ route('admin.send-email') }}" method="post">
                                @csrf


                                <input type="text" id="clients" name="clients" class="d-none">

                                {{-- campo name di piatto --}}
                                <div class="mb-3 form-floating">


                                    <input type="text" class="form-control @error('object') is-invalid @enderror"
                                        name="object" id="object" aria-describedby="nameHelper"
                                        value="{{ old('object') }}" placeholder="" required />
                                    <label for="object" class="form-label">Oggetto *</label>
                                    {{-- span di errore lato front --}}
                                    <span id="name_error" class="text-danger" role="alert"
                                        style="display: none; font-weight: 600;">
                                        L'oggetto della email e obbligatoria
                                    </span>

                                    {{-- errore lato back --}}
                                    @error('object')
                                        <div id="name_error_back" class="text-danger">{{ $message }}</div>
                                    @enderror

                                    <small id="nameHelper" class="">
                                        Inserisci l'oggetto delle email
                                    </small>

                                </div>

                                <div class="mb-3 form-floating">
                                    <textarea name="description" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2"
                                        style="height: 100px">{{ old('description') }}</textarea>
                                    <label for="floatingTextarea2">Messaggio</label>
                                </div>

                                <button type="submit" class="btn_send_email" onclick="showLoading()"
                                    id="btn_send_customer">
                                    <span>Invia email</span>
                                    <i class="ri-mail-send-fill"></i>

                                </button>
                                <button id="btn_loading_customer" class="btn_send_email" style="display: none" disabled>
                                    <span>Attendi</span>


                                </button>


                            </form>
                        </div>

                    </div>
                </div>
            </div>


        </div>


        @include('partials.session')


        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" value="all" id="select-all" onclick="allChecked()">
            <label class="form-check-label" for="select-all">
                Seleziona tutti
            </label>
        </div>


        <div class="container_table_reservation">


            <table class="table">
                <thead>
                    <tr>
                        <th style="color: hsl(228, 85%, 63%); background-color: hsla(228, 80%, 4%, 0.3);">

                        </th>
                        <th scope="col" style="color: hsl(228, 85%, 63%); background-color: hsla(228, 80%, 4%, 0.3);">
                            <span>Nome</span>
                            <span class="last_name_hidden"> e Cognome</span>
                        </th>
                        <th scope="col" class="text-center last_name_hidden"
                            style="color: hsl(228, 85%, 63%); background-color: hsla(228, 80%, 4%, 0.3);">
                            Compleanno
                        </th>
                        <th scope="col" style="color: hsl(228, 85%, 63%); background-color: hsla(228, 80%, 4%, 0.3);"
                            class="email_hidden text-center">
                            Email
                        </th>
                        <th style="color: hsl(228, 85%, 63%); background-color: hsla(228, 80%, 4%, 0.3);">
                            Azioni
                        </th>
                    </tr>
                </thead>
                <tbody>


                    @forelse ($customers as $customer)
                        <tr>
                            <td>
                                <input class="form-check-input" name="email" type="checkbox" value="{{ $customer->id }}"
                                    id="flexCheckDefault-{{ $customer->id }}"
                                    onclick="showBtn({{ $customers->count() }})">
                            </td>
                            <td style="color: hsl(228, 8%, 56%);">
                                {{ "$customer->name  " }}
                                <span class="last_name_hidden">{{ $customer->last_name }}</span>
                            </td>
                            <td class="text-center last_name_hidden" style="color: hsl(228, 8%, 56%);">
                                {{ date_format(date_create($customer->birth_day), 'd M') }}
                            </td>
                            <td style="color: hsl(228, 8%, 56%);" class="email_hidden text-center">
                                {{ "$customer->email" }}
                            </td>
                            <td>

                                <a href="{{ route('admin.customers.edit', $customer) }}" class="btn btn_modify">
                                    <i class="ri-edit-2-fill"></i>
                                </a>

                                <!-- Modal trigger button -->
                                <button type="button" class="btn btn_show" data-bs-toggle="modal"
                                    data-bs-target="#modalId-show-{{ $customer->id }}">
                                    <i class="ri-eye-2-fill"></i>
                                </button>

                                <!-- Modal Body -->
                                <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                                <div class="modal fade modal_show" id="modalId-show-{{ $customer->id }}" tabindex="-1"
                                    data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                    aria-labelledby="modalTitleId-show-{{ $customer->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                                        role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalTitleId-show-{{ $customer->id }}">
                                                    Prenotazione
                                                </h5>
                                                <button type="button" class="btn_close" data-bs-dismiss="modal"
                                                    aria-label="Close">
                                                    <i class="ri-close-circle-fill"></i>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="name">
                                                    <b>Nome: </b>
                                                    <span>
                                                        {{ "$customer->name  $customer->last_name" }}

                                                    </span>
                                                </div>
                                                <div class="hour">
                                                    <b>Data di Nascita: </b>
                                                    <span>
                                                        {{ date_format(date_create($customer->birth_day), 'd M Y') }}
                                                    </span>
                                                </div>
                                                <div class="date">
                                                    <b>Email: </b>
                                                    <span>
                                                        {{ $customer->email }}
                                                    </span>
                                                </div>
                                                <div class="person">
                                                    <b>Telefono: </b>
                                                    @if ($customer->telephone)
                                                        <span>
                                                            {{ $customer->telephone }}
                                                        </span>
                                                    @else
                                                        <span>
                                                            N/A
                                                        </span>
                                                    @endif

                                                </div>
                                                <div class="email">
                                                    <b>Data di iscrizione:</b>
                                                    <span>
                                                        {{ date_format(date_create($customer->created_at), 'd/m/y') }}
                                                    </span>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>



                                <button type="button" class="btn btn_delete" data-bs-toggle="modal"
                                    data-bs-target="#modalId-{{ $customer->id }}">
                                    <i class="ri-delete-bin-2-fill"></i>

                                </button>

                                <!-- Modal Body -->
                                <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                                <div class="modal fade modal_delete" id="modalId-{{ $customer->id }}" tabindex="-1"
                                    data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                    aria-labelledby="modalTitleId-{{ $customer->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered"
                                        role="document">
                                        <div class="modal-content">

                                            {{-- header of modal --}}
                                            <div class="modal-header header_delete">
                                                <h5 class="modal-title" id="modalTitleId-{{ $customer->id }}">
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
                                                    Sei sicuro di cancellare la prenotazione di
                                                    {{ "$customer->customer_name  $customer->customer_last_name" }}
                                                    alle {{ $customer->hour_reservation }}
                                                    , questo portera alla cancellazione anche
                                                    dei suo dati presenti.
                                                </p>

                                            </div>

                                            {{-- footer of modal --}}
                                            <div class="modal-footer footer_delete">
                                                <form action="{{ route('admin.customers.destroy', $customer) }}"
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

                    @empty
                        <tr>
                            <td colspan="3">Scusa non ci sono Allergie 😭😭</td>
                        </tr>
                    @endforelse

                </tbody>
            </table>

            @if ($customers->count() >= 1)
                {{ $customers->links('pagination::bootstrap-5') }}
            @endif
        </div>
        </ul>



    </div>
@endsection
