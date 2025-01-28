<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'back-rosmarino') }}</title>

    {{-- remixicon 4.2.0 --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.2.0/remixicon.css"
        integrity="sha512-OQDNdI5rpnZ0BRhhJc+btbbtnxaj+LdQFeh0V9/igiEPDiWE2fG+ZsXl0JEH+bjXKPJ3zcXqNyP4/F/NegVdZg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Lilita+One&family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap"
        rel="stylesheet">


    <style>
        .gang {
            margin: auto;
            width: 100px
        }

        .footer_bottom {
            text-align: center;
        }

        .mb_3 {
            margin-bottom: 30px;
        }
    </style>

</head>

<body
    style="background:#edf2f7; display: flex; align-items:center; justify-content: center; height: 100vh; color:black;">

    <div
        style="background-color: white; width:95%; heigth: 100vh; margin:auto; border-radius:5px; padding:10px; box-shadow: 2px 2px 5px hsla(228, 80%, 4%, 0.3); max-width: 600px">

        <div style="margin-top: 20px: margin-bottom:40px;">
            <div class="logo_name">
                <h1 style="text-align: center;">
                    Logo Rosmarino
                </h1>
            </div>
        </div>
        <!-- /.header_message -->
        <div class="body_message">
            <p style="text-align: center; margin-bottom: 30px;">
                Salve le vorrei informare,<br>
                @if ($contactMessage)
                    {{ $contactMessage }}
                @else
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Id, quisquam atque? Vitae sit odit sint
                    explicabo
                    ea iste quasi, repellendus, ratione dolor excepturi numquam fugit id! Corporis voluptatem quas
                    voluptate
                    facere aliquam magni quisquam beatae, delectus unde amet error quasi doloribus sed eveniet non
                    ducimus
                    consequatur itaque expedita repudiandae at!
                @endif

            </p>
            <span style="display: block; margin: 20px 0;">
                Cordiali Saluti
            </span>

            <span style="display: block; margin: 20px 0;">
                Ristorante Rosmarino
            </span>
        </div>
        <!-- /.body_message -->
        <hr>
        <div class="footer">
            <div class="footer-top">
                <span style="text-align: center; display:block; margin-bottom: 20px;">
                    Segui i nostri social:
                </span>

                <div class="gang">

                    <a href="#" style="text-decoration:none;">
                        <img src="{{ $message->embed(public_path() . '/img/instangram.png') }}" alt=""
                            style="width: 30px">
                    </a>

                    <a href="#" style="text-decoration:none;">
                        <img src="{{ $message->embed(public_path() . '/img/fork.png') }}" alt=""
                            style="width: 30px">
                    </a>

                    <a href="#" style="text-decoration:none;">
                        <img src="{{ $message->embed(public_path() . '/img/facebook.png') }}" alt=""
                            style="width: 30px">
                    </a>
                </div>


            </div>
            <hr style="width: 95%">
            <div class="footer_bottom">
                <span style="display: none;">Ci puoi trovare a:</span>
                <span class="mb_3" style="display: none">Viale Trento Trieste 61, 47838 Riccione Italia</span>
                <p>
                    Se desideri non ricevere piu newsletter
                    <a href="http://127.0.0.1:8000/api/delete-newsletter/4">clicca qui </a>
                </p>
            </div>
        </div>
        <!-- /.footer_message -->





    </div>


</body>

</html>
