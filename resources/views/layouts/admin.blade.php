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

    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])




    @yield('script')

    @livewireScripts

    <style>
        body {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            overflow-x: hidden;
        }

        #loading_app {
            top: 0;
            right: 0;
            background: #000;
            width: 100%;
            height: 200%;
            position: absolute;
            z-index: 9999;
        }

        #svg_loading {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            height: 150px;
            width: 150px;
            z-index: 9999;

            transition: opacity 5s ease-in-out;
        }

        #app {
            display: none
        }
    </style>

</head>

<body>

    <div id="loading_app">
        <svg id="svg_loading" viewBox="0 0 100 100">
            <g fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="6">
                <!-- left line -->
                <path d="M 21 40 V 59">
                    <animateTransform attributeName="transform" attributeType="XML" type="rotate"
                        values="0 21 59; 180 21 59" dur="2s" repeatCount="indefinite" />
                </path>
                <!-- right line -->
                <path d="M 79 40 V 59">
                    <animateTransform attributeName="transform" attributeType="XML" type="rotate"
                        values="0 79 59; -180 79 59" dur="2s" repeatCount="indefinite" />
                </path>
                <!-- top line -->
                <path d="M 50 21 V 40">
                    <animate attributeName="d" values="M 50 21 V 40; M 50 59 V 40" dur="2s"
                        repeatCount="indefinite" />
                </path>
                <!-- btm line -->
                <path d="M 50 60 V 79">
                    <animate attributeName="d" values="M 50 60 V 79; M 50 98 V 79" dur="2s"
                        repeatCount="indefinite" />
                </path>
                <!-- top box -->
                <path d="M 50 21 L 79 40 L 50 60 L 21 40 Z">
                    <animate attributeName="stroke" values="rgba(255,255,255,1); rgba(100,100,100,0)" dur="2s"
                        repeatCount="indefinite" />
                </path>
                <!-- mid box -->
                <path d="M 50 40 L 79 59 L 50 79 L 21 59 Z" />
                <!-- btm box -->
                <path d="M 50 59 L 79 78 L 50 98 L 21 78 Z">
                    <animate attributeName="stroke" values="rgba(100,100,100,0); rgba(255,255,255,1)" dur="2s"
                        repeatCount="indefinite" />
                </path>
                <animateTransform attributeName="transform" attributeType="XML" type="translate" values="0 0; 0 -19"
                    dur="2s" repeatCount="indefinite" />
            </g>
        </svg>
    </div>
    <!--=============== HEADER ===============-->
    <header class="header" id="header">
        <div class="header__container">
            <a href="#" class="header__logo">
                <i class="ri-database-2-fill"></i>
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
                        <a href="{{ route('admin.allergy.index') }}" class="sidebar__link ">
                            <i class="ri-dislike-line"></i>
                            <span>Allergie</span>
                        </a>

                        <a href="{{ route('admin.dishes.index') }}" class="sidebar__link">
                            <i class="ri-restaurant-line"></i>
                            <span>Menu</span>
                        </a>

                        <a href="{{ route('admin.reservations.index') }}" class="sidebar__link">
                            <i class="ri-calendar-check-line"></i>
                            <span>Prenotazioni</span>
                        </a>

                        <a href="{{ route('admin.customers.index') }}" class="sidebar__link">
                            <i class="ri-group-fill"></i>
                            <span>Clienti</span>
                        </a>
                    </div>
                </div>

                <div>
                    <h3 class="sidebar__title">IMPOSTAZIONI</h3>

                    <div class="sidebar__list">
                        <a href="{{ url('profile') }}" class="sidebar__link">
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
                {{-- se clicco scollega l'utente --}}
                <a class="sidebar__link" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();
                                     localStorage.removeItem('route-page');">
                    <i class="ri-logout-box-r-fill"></i>
                    <span>Log Out</span>
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
            <!-- /.sidebar__actions -->
        </div>
        <!-- /.sidebar__container -->

    </nav>

    <!--=============== MAIN ===============-->
    <main class="main" id="main">
        @yield('content')
    </main>

    <script src="{{ asset('js/sidebar.js') }}"></script>
</body>

</html>
