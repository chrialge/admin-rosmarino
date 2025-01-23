@component('mail::message')

    ![The San Juan Mountains are beautiful!]('backrosmarino.org/public/img/pasta.jpg' "San Juan Mountains")

    @component('mail::button', ['url' => ''])
        ciao
    @endcomponent


    Grazie,
    {{ config('app.name') }}
@endcomponent
