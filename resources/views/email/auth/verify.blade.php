@component('mail::message')
# Verification Email

Please verify your email by click the link below.

@component('mail::button', ['url' => $verification_url])
Verify Email
@endcomponent

Or copy this URL and past it to your web browser.

<span style='word-break: break-word'>{{ $verification_url }}</span>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
