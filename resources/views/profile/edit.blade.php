@extends('layouts.admin')
@section('content')
    <div class="container_profile">

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
                <a href="" class="text-decoration-none" style="font-weight: 600; color: hsl(228, 85%, 63%);">
                    Profile
                </a>
            </li>
        </ul>

        <h2 class=" my-4">
            {{ __('Profile') }}
        </h2>
        <div class="card_profile_information">

            @include('profile.partials.update-profile-information-form')

        </div>

        <div class="card_update_password">


            @include('profile.partials.update-password-form')

        </div>

        <div class="card_delete_account">


            @include('profile.partials.delete-user-form')

        </div>
    </div>
@endsection
