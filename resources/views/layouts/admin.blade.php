<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

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

    <!-- Usando Vite -->
    @vite(['resources/js/app.js', 'resources/js/siderbar.js', 'resources/scss/siderbar.scss'])

    <style>
        body {
            font-family: "Nunito", sans-serif;
        }
    </style>
</head>

<body>
    <!--=============== HEADER ===============-->
    <header class="header" id="header">
        <div class="header__container">
            <a href="#" class="header__logo">
                <i class="ri-cloud-fill"></i>
                <span>Cloud</span>
            </a>

            <button class="header__toggle" id="header-toggle">
                <i class="ri-menu-line"></i>
            </button>
        </div>
    </header>

    <!--=============== SIDEBAR ===============-->
    <nav class="sidebar" id="sidebar">

        <div class="sidebar__container">

            <div class="sidebar__user">
                <div class="sidebar__img">
                    <img src="{{ asset('img/perfil.png') }}" alt="image of profile">
                </div>

                <div class="sidebar__info">
                    <h3>{{ Auth::user()['name'] }}</h3>
                    <span>{{ Auth::user()['email'] }}</< /span>
                </div>
            </div>
            <!-- /.sidebar__user -->



            <div class="sidebar__content">
                <div>
                    <h3 class="sidebar__title">MANAGE</h3>

                    <div class="sidebar__list">
                        <a href="#" class="sidebar__link">
                            <i class="ri-dislike-line"></i>
                            <span>Allergie</span>
                        </a>

                        <a href="#" class="sidebar__link">
                            <i class="ri-restaurant-line"></i>
                            <span>Menu</span>
                        </a>

                        <a href="#" class="sidebar__link">
                            <i class="ri-calendar-check-line"></i>
                            <span>Prenotazioni</span>
                        </a>

                        <a href="#" class="sidebar__link">
                            <i class="ri-group-fill"></i>
                            <span>Clienti</span>
                        </a>
                    </div>
                </div>

                <div>
                    <h3 class="sidebar__title">IMPOSTAZIONI</h3>

                    <div class="sidebar__list">
                        <a href="#" class="sidebar__link">
                            <i class="ri-user-settings-fill"></i>
                            <span>Account</span>
                        </a>


                    </div>
                </div>
            </div>
            <!-- /.sidebar__content -->



            <div class="sidebar__actions">
                <button>
                    <i class="ri-moon-clear-fill sidebar__link sidebar__theme" id="theme-button">
                        <span>Theme</span>
                    </i>
                </button>

                <button class="sidebar__link">
                    <i class="ri-logout-box-r-fill"></i>
                    <span>Log Out</span>
                </button>
            </div>
            <!-- /.sidebar__actions -->
        </div>
        <!-- /.sidebar__container -->

    </nav>

    <!--=============== MAIN ===============-->
    <main class="main container" id="main">
        @yield('content')
    </main>

</body>

</html>
