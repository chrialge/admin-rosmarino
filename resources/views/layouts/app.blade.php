<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


    {{-- remixicon 4.2.0 --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.2.0/remixicon.css"
        integrity="sha512-OQDNdI5rpnZ0BRhhJc+btbbtnxaj+LdQFeh0V9/igiEPDiWE2fG+ZsXl0JEH+bjXKPJ3zcXqNyP4/F/NegVdZg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])

    <script src="{{ asset('js/change_color.js') }}"></script>

    <style>
        body {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            overflow-x: hidden;
        }

        #loading_app {
            background: #000;
            width: 100%;
            height: 100vh;
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

        .container>h2 {
            text-align: center;
            padding: 20px 0;
        }

        .container_info {
            gap: 20px;
            max-width: 800px;
            margin: auto;
            display: flex;
            align-items: center;
            flex-wrap: wrap;
        }

        .col_info {
            width: 100%
        }

        .left {
            text-align: center;
        }

        #site_footer {
            background-color: hsla(228, 70%, 6%, 1);
            position: relative;
            bottom: 0;
            left: 0;
            width: 100%;
        }

        .top_footer {
            padding: 20px 0 30px;
            margin: auto;
            width: 95%;
            max-width: 400px;

        }

        .top_footer>h6 {
            text-align: center;
            color: hsl(228, 70%, 63%);
        }

        .top_footer>ul {
            list-style: none;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            padding: 0;
        }

        .top_footer>ul>li>a {
            cursor: pointer;
            padding: 3px 5px;
            color: white;
            transition: all 0.3s ease-in-out;
            font-size: 20px;
            border-radius: 5px;


        }

        .bottom_footer {
            text-align: center;
            color: hsl(228, 70%, 63%);
        }

        .top_footer>ul>li>a:hover {
            background-color: hsl(228, 70%, 63%);
        }

        .dropdown-menu[data-bs-popper] {
            right: 100px;
        }

        .dropdown {
            margin-right: 70px
        }

        @media screen and (min-width: 600px) {


            .col_info {
                width: calc((100% / 12) * 6 - 10px)
            }

            .reserve {
                flex-direction: row-reverse;
            }
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

    <div id="app">


        <nav class="navbar navbar-expand-md shadow-sm navbar_welcome">
            <div class="container">

                <div id="theme_switcher">
                    <i id="icon_sun" class="ri-sun-fill"></i>
                    <i id="icon_moon" class="ri-moon-clear-fill"></i>
                </div>

                <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                    <div class="logo_laravel" style="max-width: 80px">
                        <img src="{{ asset('img/logo_chrialge_blu.png') }}" alt="" width="100">
                    </div>
                    {{-- config('app.name', 'Laravel') --}}
                </a>



                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <i class="ri-menu-line"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/') }}">{{ __('Home') }}</a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->


                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Accedi') }}</a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item"
                                        href="{{ route('admin.allergy.index') }}">{{ __('Dashboard') }}</a>
                                    <a class="dropdown-item" href="{{ url('profile') }}">{{ __('Profile') }}</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="main_welcome">
            @yield('content')
        </main>
    </div>
</body>

</html>
