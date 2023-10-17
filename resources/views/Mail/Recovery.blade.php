@component('mail::message')
<h2>  Hi {{$user->name}} </h2>
<h1> Reset Password </h1>

You have requested to reset your account password.
<br>
Kindly click on the link below to change your password

@component('mail::button', ['url' => env('APP_URL').':8000/password/reset/'.$password_reset->email.'/'.$password_reset->token])
Change Passwod
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
