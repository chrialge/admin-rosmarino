@extends('layouts.admin')

@section('script')
    <script src="{{ asset('js/reservation_index.js') }}"></script>
@endsection


@section('content')
    <div class="container_reservation">

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
                    Prenotazioni
                </a>
            </li>
        </ul>





        @livewire('Reservations')



        @livewireScripts
    </div>
@endsection
