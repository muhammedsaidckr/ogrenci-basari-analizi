@component('mail::message')
# İletişim Mesajı

-İsim : {{$name}}
-Email: {{$email}}
-Tel  : {{$phone}}

{{ config('app.name') }}
@endcomponent
