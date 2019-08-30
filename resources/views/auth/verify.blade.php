@extends('layouts.app')
@section('title', 'Верификация email-адреса | Саженцы в Крыму')
@section('description', 'На этой странице Вы можете отправить заново письмо на Вашу электронную почту')

@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumbs">
                        <ul>
                            <li><a href="{{ route('page.show') }}">Главная</a></li>
                            <li>Верификация email-адреса</li>
                        </ul>
                    </div>

                    <div class="text">
                        <h2>Проверьте свой адрес электронной почты</h2>

                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                На ваш адрес электронной почты была отправлена новая ссылка для подтверждения.
                            </div>
                        @endif

                        <p>Прежде чем продолжить, проверьте свою электронную почту на наличие ссылки для подтверждения.</p>
                        <p>Если вы не получили письмо, <a href="{{ route('verification.resend') }}">нажмите здесь, чтобы запросить другое письмо</a>.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
