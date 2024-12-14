@extends('layouts.admin')

@section('script')
    <script src="{{ asset('js/dish_index.js') }}"></script>
@endsection


@section('content')
    <div class="container-dish">

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
                    Menu
                </a>
            </li>
        </ul>

        {{-- title --}}

        <div class="header_page">
            <h2>
                Piatti {{ $count }}
            </h2>

            <a href="#" class="btn btn_create">
                <span> Crea Piatto</span>
                <i class="ri-add-large-fill"></i>
            </a>
        </div>



        {{-- container degl'antipasti --}}
        <div class="entre_plate_container">

            {{-- header del container --}}
            <div class="header_container" onclick="showPlate(0)">
                <h3>
                    Antipasti {{ $entrePlate->count() }}
                </h3>
                <i class="ri-arrow-down-s-line icon_show_menu"></i>
            </div>

            {{-- separator --}}
            <div class="separator">
            </div>

            {{-- container delle card  --}}
            <div class="container_card">
                @forelse ($entrePlate as $plate)
                    <div class="card_plate">

                        <div class="card_header">
                            <img src="{{ asset('img/pasta.jpg') }}" alt="">
                        </div>
                        <div class="card_body">
                            <h5>
                                {{ $plate->name }}
                            </h5>
                            <span>
                                {{ $plate->price }}
                            </span>
                        </div>
                        <div class="card_footer">

                            <div class="btn btn_delete">
                                <i class="ri-delete-bin-5-fill"></i>
                            </div>

                            <div class="btn btn_show">
                                <i class="ri-eye-2-fill"></i>
                            </div>

                            <div class=" btn btn_edit">
                                <i class="ri-edit-fill"></i>
                            </div>
                        </div>
                    </div>
                @empty
                    <h4 style="color: hsl(228, 85%, 63%)">Non hai Antipasti</h4>
                @endforelse

            </div>

        </div>
        <!-- /.entre_plate_container -->

        {{-- conatiner dei primi piatti --}}
        <div class="first_plate_container">

            {{-- header del container --}}
            <div class="header_container" onclick="showPlate(1)">
                <h3>
                    Primi Piatti {{ $firstPlate->count() }}
                </h3>
                <i class="ri-arrow-down-s-line icon_show_menu"></i>
            </div>

            {{-- separator --}}
            <div class="separator">
            </div>



            {{-- container delle card  --}}
            <div class="container_card">

                @forelse ($firstPlate as $plate)
                    <div class="card_plate">

                        <div class="card_header">
                            <img src="{{ asset('img/pasta.jpg') }}" alt="">
                        </div>
                        <div class="card_body">
                            <h5>
                                {{ $plate->name }}
                            </h5>
                            <span>
                                {{ $plate->price }}
                            </span>
                        </div>
                        <div class="card_footer">

                            <div class="btn btn_delete">
                                <i class="ri-delete-bin-5-fill"></i>
                            </div>

                            <div class="btn btn_show">
                                <i class="ri-eye-2-fill"></i>
                            </div>

                            <div class=" btn btn_edit">
                                <i class="ri-edit-fill"></i>
                            </div>
                        </div>
                    </div>
                @empty
                    <h4 style="color: hsl(228, 85%, 63%)">Non hai primi piatti</h4>
                @endforelse
            </div>

        </div>

        {{-- container dei piatti secondi --}}
        <div class="second_plate_container">

            {{-- header del container --}}
            <div class="header_container" onclick="showPlate(2)">
                <h3>
                    Secondi Piatti {{ $secondPlate->count() }}
                </h3>
                <i class="ri-arrow-down-s-line icon_show_menu"></i>
            </div>

            {{-- separator --}}
            <div class="separator">
            </div>

            {{-- container delle card  --}}
            <div class="container_card">

                @forelse ($secondPlate as $plate)
                    <div class="card_plate">

                        <div class="card_header">
                            <img src="{{ asset('img/pasta.jpg') }}" alt="">
                        </div>
                        <div class="card_body">
                            <h5>
                                {{ $plate->name }}
                            </h5>
                            <span>
                                {{ $plate->price }}
                            </span>
                        </div>
                        <div class="card_footer">

                            <div class="btn btn_delete">
                                <i class="ri-delete-bin-5-fill"></i>
                            </div>

                            <div class="btn btn_show">
                                <i class="ri-eye-2-fill"></i>
                            </div>

                            <div class=" btn btn_edit">
                                <i class="ri-edit-fill"></i>
                            </div>
                        </div>
                    </div>
                @empty
                    <h4 style="color: hsl(228, 85%, 63%)">Non hai secondi piatti</h4>
                @endforelse
            </div>

        </div>
        <!-- /.second_plate_container -->

        {{-- container dessert --}}
        <div class="dessert_plate_container">

            {{-- header del container --}}
            <div class="header_container" onclick="showPlate(3)">
                <h3>
                    Dessert {{ $dessertPlate->count() }}
                </h3>
                <i class="ri-arrow-down-s-line icon_show_menu"></i>
            </div>

            {{-- separator --}}
            <div class="separator">
            </div>

            {{-- container delle card  --}}
            <div class="container_card">

                @forelse ($dessertPlate as $plate)
                    <div class="card_plate">

                        <div class="card_header">
                            <img src="{{ asset('img/pasta.jpg') }}" alt="">
                        </div>
                        <div class="card_body">
                            <h5>
                                {{ $plate->name }}
                            </h5>
                            <span>
                                {{ $plate->price }}
                            </span>
                        </div>
                        <div class="card_footer">

                            <div class="btn btn_delete">
                                <i class="ri-delete-bin-5-fill"></i>
                            </div>

                            <div class="btn btn_show">
                                <i class="ri-eye-2-fill"></i>
                            </div>

                            <div class=" btn btn_edit">
                                <i class="ri-edit-fill"></i>
                            </div>
                        </div>
                    </div>
                @empty
                    <h4 style="color: hsl(228, 85%, 63%)">Non hai Dessert</h4>
                @endforelse
            </div>

        </div>
        <!-- /.dessert_plate_container -->

        {{-- container drink --}}
        <div class="drink_container">
            {{-- header del container --}}
            <div class="header_container" onclick="showPlate(4)">
                <h3>
                    Bevande {{ $drinks->count() }}
                </h3>
                <i class="ri-arrow-down-s-line icon_show_menu"></i>
            </div>

            {{-- separator --}}
            <div class="separator">
            </div>


            {{-- container delle card  --}}
            <div class="container_card">

                @forelse ($drinks as $plate)
                    <div class="card_plate">

                        <div class="card_header">
                            <img src="{{ asset('img/pasta.jpg') }}" alt="">
                        </div>
                        <div class="card_body">
                            <h5>
                                {{ $plate->name }}
                            </h5>
                            <span>
                                {{ $plate->price }}
                            </span>
                        </div>
                        <div class="card_footer">

                            <div class="btn btn_delete">
                                <i class="ri-delete-bin-5-fill"></i>
                            </div>

                            <div class="btn btn_show">
                                <i class="ri-eye-2-fill"></i>
                            </div>

                            <div class=" btn btn_edit">
                                <i class="ri-edit-fill"></i>
                            </div>
                        </div>
                    </div>
                @empty
                    <h4 style="color: hsl(228, 85%, 63%)">Non hai Bevande</h4>
                @endforelse
            </div>

        </div>
        <!-- /.drink_plate -->

    </div>
@endsection
