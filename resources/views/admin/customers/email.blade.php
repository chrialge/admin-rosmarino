@extends('layouts.admin')

@section('script')
    <script src="{{ asset('js/send_email.js') }}"></script>
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
                <a href="#" class="text-decoration-none" style="font-weight: 600; color: hsl(228, 85%, 63%);">
                    Invio E-mail
                </a>
            </li>
        </ul>

        {{-- header page --}}
        <div class="header_page_customer g-1">

            {{-- titolo --}}
            <h2>
                Invia E-mail
            </h2>

            {{-- bottone che rimanda alla pagina precedente --}}
            <a href="{{ route('admin.customers.index') }}" class="btn_return btn">
                <span>Indietro</span>
                <i class="ri-arrow-left-circle-line"></i>
            </a>
        </div>

        <div class="container_form_send_email">

            <form action="{{ route('admin.send-email') }}" method="post" onsubmit="check_form(event)">
                @csrf

                <div class="mb-3">
                    <h4 class="pb-2 text-first"><b>Ai Clienti:</b></h4>
                    @foreach ($arrayClients as $key => $client)
                        @if ($key == count($arrayClients) - 1)
                            <span>{{ ucwords($client->name) . ' ' . ucwords($client->last_name) }} .</span>
                        @else
                            <span>{{ ucwords($client->name) . ' ' . ucwords($client->last_name) }},</span>
                        @endif
                    @endforeach
                </div>

                <input type="text" value="{{ $clients }}" name="clients" id="clients" style="display: none">



                <div class="mb-3">
                    <label for="object" class="form-label">
                        <h4 class="text-first">
                            <b>Oggetto</b>
                        </h4>
                    </label>
                    <input type="text" class="form-control mb-2" name="object" id="object" aria-describedby="helpId"
                        placeholder=" newsletter" onblur="check_object()" onkeyup="hide_error_object()" />
                    <span id="error_object" class="text-danger" style="display: none">
                        Inserisci l'oggetto della e-mail
                    </span>
                </div>

                <h4 class="text-first">
                    <b>
                        Email:
                    </b>
                </h4>

                <div class="container_email">

                    <div class="header_email">
                        <h3>
                            Ristorante Rosmarino
                        </h3>
                    </div>

                    <div class="mb-3">
                        <label for="message" class="form-label"></label>
                        <textarea class="form-control" name="message" id="message" rows="3" cols="100" onblur="check_message()"
                            onkeyup="hide_error_message()">
                            
                        </textarea>
                    </div>

                    <div class="footer_email">
                        <div class="footer_top">
                            <span>
                                Segui i nostro social:
                            </span>

                            <ul>
                                <li>
                                    <a href="#" style="color: #be9639">
                                        <i class="ri-facebook-circle-fill"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" style="color: #be9639">
                                        <i class="ri-instagram-fill"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div style="width: 22px; overflow:hidden;">
                                            <img src="{{ asset('img/Thefork-logo-green.svg') }}" alt=""
                                                style="min-width: 80px; width: 80px">
                                        </div>

                                    </a>
                                </li>
                            </ul>
                        </div>
                        <hr>
                        <div class="footer_bottom">
                            <span>Ci puoi trovare a:</span>
                            <span class="mb-4">Viale Trento Trieste 61, 47838 Riccione Italia</span>
                            <p>
                                Se desideri non ricevere piu newsletter
                                <a href="#">clicca qui </a>
                            </p>
                        </div>
                    </div>

                </div>

                <span id="error_message" class="text-danger  mb-3" style="display: none">
                    Inserisci il messaggio della email
                </span>

                <button id="btn_mail" class="btn_send btn" type="submit">
                    Invia Email
                    <i class="ri-mail-send-fill"></i>
                </button>


                <button id="btn_loading" class="btn btn_send" style="display: none" disabled>
                    Attendi...
                </button>


            </form>
        </div>
    </div>
@endsection
