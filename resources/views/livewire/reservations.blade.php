<div>

    <form>
        <input type="text" value="Lunedi" style="display: none">
        <button type="submit" class="btn_chunky">
            Lunedi
        </button>
    </form>
    <div class="container_table_reservation">


        <table class="table">
            <thead>
                <tr>
                    <th scope="col" style="color: hsl(228, 85%, 63%); background-color: hsla(228, 80%, 4%, 0.3);">
                        <span>Nome</span>
                        <span class="last_name_hidden"> e Cognome</span>
                    </th>
                    <th scope="col" style="color: hsl(228, 85%, 63%); background-color: hsla(228, 80%, 4%, 0.3);">
                        Pax
                    </th>
                    <th scope="col" style="color: hsl(228, 85%, 63%); background-color: hsla(228, 80%, 4%, 0.3);">
                        Ora
                    </th>
                    <th scope="col" class="last_name_hidden"
                        style="color: hsl(228, 85%, 63%); background-color: hsla(228, 80%, 4%, 0.3);">
                        telefono
                    </th>
                    <th style="color: hsl(228, 85%, 63%); background-color: hsla(228, 80%, 4%, 0.3);">
                        Azioni
                    </th>
                </tr>
            </thead>
            <tbody>


                @forelse ($reservations as $reservation)
                    <tr>
                        <td style="color: hsl(228, 8%, 56%);">
                            {{ "$reservation->customer_name  " }}
                            <span class="last_name_hidden">{{ $reservation->customer_last_name }}</span>
                        </td>
                        <td style="color: hsl(228, 8%, 56%);"> {{ "$reservation->person" }} </td>
                        <td style="color: hsl(228, 8%, 56%);">
                            {{ date_format(date_create($reservation->hour_reservation), 'h:i') }}
                        </td>
                        <td style="color: hsl(228, 8%, 56%);" class="last_name_hidden">
                            {{ "$reservation->customer_telephone" }} </td>

                        <td>

                            <a href="{{ route('admin.reservations.edit', $reservation) }}" class="btn btn_modify">
                                <i class="ri-edit-2-fill"></i>
                            </a>

                            <!-- Modal trigger button -->
                            <button type="button" class="btn btn_show" data-bs-toggle="modal"
                                data-bs-target="#modalId-show-{{ $reservation->id }}">
                                <i class="ri-eye-2-fill"></i>
                            </button>

                            <!-- Modal Body -->
                            <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                            <div class="modal fade modal_show" id="modalId-show-{{ $reservation->id }}" tabindex="-1"
                                data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                aria-labelledby="modalTitleId-show-{{ $reservation->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                                    role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalTitleId-show-{{ $reservation->id }}">
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
                                                    {{ "$reservation->customer_name  $reservation->customer_last_name" }}

                                                </span>
                                            </div>
                                            <div class="hour">
                                                <b>Ora: </b>
                                                <span>
                                                    {{ date_format(date_create($reservation->hour_reservation), 'h:i') }}
                                                </span>
                                            </div>
                                            <div class="date">
                                                <b>Data: </b>
                                                <span>
                                                    {{ date_format(date_create($reservation->hour_reservation), 'd/m/Y') }}
                                                </span>
                                            </div>
                                            <div class="person">
                                                <b>Persone: </b>
                                                <span>
                                                    {{ $reservation->person }}
                                                </span>
                                            </div>
                                            <div class="telephone">
                                                <b>telefono:</b>
                                                <span>
                                                    {{ $reservation->customer_telephone }}
                                                </span>
                                            </div>
                                            <div class="email">
                                                <b>Email:</b>
                                                <span>
                                                    {{ $reservation->customer_email }}
                                                </span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>



                            <button type="button" class="btn btn_delete" data-bs-toggle="modal"
                                data-bs-target="#modalId-{{ $reservation->id }}">
                                <i class="ri-delete-bin-2-fill"></i>

                            </button>

                            <!-- Modal Body -->
                            <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                            <div class="modal fade" id="modalId-{{ $reservation->id }}" tabindex="-1"
                                data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                aria-labelledby="modalTitleId-{{ $reservation->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
                                    <div class="modal-content">

                                        {{-- header of modal --}}
                                        <div class="modal-header header_delete">
                                            <h5 class="modal-title" id="modalTitleId-{{ $reservation->id }}">
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
                                                {{ "$reservation->customer_name  $reservation->customer_last_name" }}
                                                alle {{ $reservation->hour_reservation }}
                                                , questo portera alla cancellazione anche
                                                dei suo dati presenti.
                                            </p>

                                        </div>

                                        {{-- footer of modal --}}
                                        <div class="modal-footer footer_delete">
                                            <form action="{{ route('admin.reservations.destroy', $reservation) }}"
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

        @if ($reservations->count() >= 1)
            {{ $reservations->links('pagination::bootstrap-5') }}
        @endif
    </div>
</div>
