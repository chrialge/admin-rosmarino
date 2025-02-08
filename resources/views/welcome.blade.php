@extends('layouts.app')

@section('content')
    <div class="container ">
        <h2>Back Office</h2>

        <span style="text-align: center; margin:auto; max-width:400px; display:block; padding: 0 5px 20px">
            Gestionale creato per soddisfare le esigenze del Ristorante Rosmarino
        </span>

        <div class="container_info mb-5">
            <div class="left col_info">
                <p>
                    Puoi creare, Modificare ed eventualmente cancellare i piatti che ti hanno stufato!!
                </p>
            </div>

            <div class="right col">
                <img src="{{ asset('img/page-menu.png') }}" alt="" width="100%">
            </div>

        </div>

        <div class="container_info reserve mb-5">
            <div class="left col_info">
                <p>
                    Puoi visionare le prenotazioni effetuate dal tuo sito, e controllare lo stato. Quando prenotera dal tuo
                    sito grazie a telegram bot ti arrivera un messaggio.
                </p>
            </div>

            <div class="right col">
                <img src="{{ asset('img/page-reservation.png') }}" alt="" width="100%">
            </div>

        </div>

        <div class="container_info mb-5">
            <div class="left col_info">
                <p>
                    Puoi visionare i clienti che si sono iscritti alla newsletter del tuo sito e in caso inviare email
                    mirate o massive ad essi.
                </p>
            </div>

            <div class="right col">
                <img src="{{ asset('img/page-customer.png') }}" alt="" width="100%">
            </div>

        </div>



    </div>

    <footer id="site_footer">
        <div class="top_footer">
            <h6>
                Contatti
            </h6>
            <ul>
                <li>
                    <a href="https://github.com/chrialge" target="_blank">
                        <i class="ri-github-fill"></i>
                    </a>
                </li>
                <li>
                    <a href="https://www.linkedin.com/in/christian-algieri-dev" target="_blank">
                        <i class="fa-brands fa-linkedin"></i>
                    </a>
                </li>
                <li>
                    <a href="mailto:chrialge99@gmail.com" target="_top">
                        <i class="ri-mail-fill"></i>

                    </a>
                </li>
            </ul>
        </div>
        <div class="bottom_footer">
            &copy; 2025 Christian Algieri
        </div>
    </footer>
@endsection
