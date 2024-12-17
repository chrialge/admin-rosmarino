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

</head>

<body style="background:gray; display: flex; align-items:center; justify-content: center; height: 100vh;">

    <div
        style="background-color: white; width:95%; heigth: 100vh; margin:auto; border-radius:20px; padding:10px; box-shadow: 2px 2px 5px hsla(228, 80%, 4%, 0.3);">

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
                Salve le vorrei informare,
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
        <div style="display: flex; align-items:center; justify-center: space-between; flex-wrap: wrap;">

            <div style="text-align:start;">

                <span style="margin-bottom: 5px; display:block">Ristorante Rosmarino</span>

                <a href="#"style="margin-bottom: 5px">
                    link
                </a>

                <span style="display: block; margin-bottom:5px">Viale Trento e Trieste, 61, 47838 Riccione</span>


                <span style="display:block; margin-bottom: 5px">376 154 5557</span>

            </div>
            <div style="list-style: none; padding: 0;">
                <img src="{{ asset('img/pasta.jpg') }}" alt="">
            </div>
        </div>
        <!-- /.footer_message -->





    </div>


</body>

</html>
