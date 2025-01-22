@extends('layouts.admin')


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

        <div class="container_form_sen_email">

            <form action="" method="post">
                @csrf

                <div class="mb-3">
                    <h4 class="pb-2"><b>Ai Clienti:</b></h4>
                    @foreach ($arrayClients as $key => $client)
                        @if ($key == count($arrayClients) - 1)
                            <span>{{ ucwords($client->name) . ' ' . ucwords($client->last_name) }} .</span>
                        @else
                            <span>{{ ucwords($client->name) . ' ' . ucwords($client->last_name) }},</span>
                        @endif
                    @endforeach
                </div>



                <div class="mb-3">
                    <label for="object" class="form-label">
                        <h4>
                            <b>Oggetto</b>
                        </h4>
                    </label>
                    <input type="text" class="form-control" name="object" id="object" aria-describedby="helpId"
                        placeholder=" newsletter" />
                    <small id="helpId" class="form-text text-muted">Help text</small>
                </div>

                <h4>
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
                        <textarea class="form-control" name="message" id="message" rows="3" cols="100">
                            
                        </textarea>
                    </div>

                    <div class="footer_email">
                        <div class="footer_top">
                            <span>
                                Segui i nostro social:
                            </span>

                            <ul>
                                <li>
                                    <a href="#">
                                        <i class="ri-facebook-circle-fill"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
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
                                Hai cambiato idea? Tu puoi <a href="">discriverti </a>quando vuoi
                            </p>
                        </div>
                    </div>


                </div>

                <button class="btn" type="submit">
                    Invia Email
                </button>


                <button class="btn" style="display: none" disabled>
                    Attendi...
                </button>


            </form>
        </div>
    </div>
@endsection
