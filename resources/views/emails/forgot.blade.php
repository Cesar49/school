@component('mail::message')

Hello: {{$user->name}},

<p>Como estas.?</p>

@component('mail::button', ['url' => url('reset/'.$user->remember_token)])

Resetea tu clave

@endcomponent

Gracias, <br>
{{ config('app_name') }}

@endcomponent