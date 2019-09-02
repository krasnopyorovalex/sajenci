@component('mail::message')

    {{-- Action Button --}}
    @component('mail::button', ['url' => $verificationUrl, 'color' => 'primary'])
        Подтвердить
    @endcomponent

@endcomponent
