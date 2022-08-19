@component('mail::message')
# Reset password.

Click link below to access the password reset form.

@component('mail::button', ['url' => $url])
Reset password
@endcomponent

Or copy this URL and past it to your web browser.

<span style='word-break: break-word'>{{ $url }}</span>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
