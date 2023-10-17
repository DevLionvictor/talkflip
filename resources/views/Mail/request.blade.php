@component('mail::message')
# New Request

Hi a new currency request has been placed.

<p>

        Currency Title:

        <br>
        Shortcode:

        <br>
        Contract Address:



</p>

@component('mail::button', ['url' => 'https://exchange.talkflip.co/admin'])
Go TO Admin
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
