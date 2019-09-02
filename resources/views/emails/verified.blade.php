@component('mail::message')

@slot('header')
@slot('header')
@component('mail::header', ['url' => config('app.url')])
Интернет-магазин «Саженцы в Крыму»
@endcomponent
@endslot
@endslot

# Здравствуйте!

Подтвердите, пожалуйста, адрес электронной почты.

{{-- Action Button --}}
@component('mail::button', ['url' => $verificationUrl, 'color' => 'primary'])
Подтвердить
@endcomponent

Если Вы не создавали учётную запись, то никаких дальнейших действий не требуется.

С уважением,<br/>
«Саженцы в Крыму»

{{-- Subcopy --}}
@slot('subcopy')
    @lang(
        "Если у вас возникли проблемы, нажав кнопку \":actionText\", скопируйте и вставьте URL ниже\n".
        'в Ваш браузер: [:actionURL](:actionURL)',
        [
            'actionText' => 'Подтвердить',
            'actionURL' => $verificationUrl,
        ]
    )
@endslot

@slot('footer')
@component('mail::footer')
© {{ date('Y') }} «Саженцы в Крыму». Все права защищены.
@endcomponent
@endslot
@endcomponent
