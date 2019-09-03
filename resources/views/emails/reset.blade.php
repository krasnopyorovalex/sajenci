@component('mail::message')

# Здравствуйте!

Нажмите на кнопку для сброса пароля

{{-- Action Button --}}
@component('mail::button', ['url' => $resetUrl, 'color' => 'green'])
Сбросить
@endcomponent

С уважением,<br/>
«Саженцы в Крыму»

{{-- Subcopy --}}
@slot('subcopy')
    @lang(
        "Если у вас возникли проблемы, нажав кнопку \":actionText\", скопируйте и вставьте URL ниже\n".
        'в Ваш браузер: [:actionURL](:actionURL)',
        [
            'actionText' => 'Сбросить',
            'actionURL' => $resetUrl,
        ]
    )
@endslot
@endcomponent
