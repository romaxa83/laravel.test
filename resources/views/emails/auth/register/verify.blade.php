@component('mail::message')
    # Email Confirmation

    Пожалуйста пройдите по ссылке:

    @component('mail::button', ['url' => route('register.verify', ['token' => $user->verify_token])])
        Потверждение почты
    @endcomponent

    Спасибо,<br>
    {{ config('app.name') }}
@endcomponent
