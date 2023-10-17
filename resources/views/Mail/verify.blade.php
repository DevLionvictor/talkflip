@component('mail::message')
# Verify Your Email Address
Hi {{$user->name}} <br>

        
Please verify your contact address by entering the code below on the portal or clicking the verify link below.
 <h3> {{$user->ver_token}} </h3>
@component('mail::button', ['url' => env('APP_URL').':8000/verifynow/'.$user->email.'/'.$user->ver_token])
Verify
@endcomponent
<p> If it  was not you that registered no further action is required! </p>

Thanks,<br>
{{ config('app.name') }} Team.
@endcomponent
