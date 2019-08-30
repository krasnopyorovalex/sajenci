<!DOCTYPE html>
<html lang="ru-RU" prefix="og: http://ogp.me/ns#">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimal-ui">
    <title>Страница входа</title>
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="theme-color" content="#fff">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('img/favicons/favicon.ico') }}" type="image/x-icon">
    <link rel="icon" sizes="16x16" href="{{ asset('img/favicons/favicon-16x16.png') }}" type="image/png">
    <link rel="icon" sizes="32x32" href="{{ asset('img/favicons/favicon-32x32.png') }}" type="image/png">
    <link rel="apple-touch-icon-precomposed" href="{{ asset('img/favicons/apple-touch-icon-precomposed.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('img/favicons/apple-touch-icon.png') }}">
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('img/favicons/apple-touch-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('img/favicons/apple-touch-icon-60x60.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('img/favicons/apple-touch-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/favicons/apple-touch-icon-76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('img/favicons/apple-touch-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('img/favicons/apple-touch-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('img/favicons/apple-touch-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('img/favicons/apple-touch-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="167x167" href="{{ asset('img/favicons/apple-touch-icon-167x167.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/favicons/apple-touch-icon-180x180.png') }}">
    <link rel="apple-touch-icon" sizes="1024x1024" href="{{ asset('img/favicons/apple-touch-icon-1024x1024.png') }}">
    <link href="{{ asset('css/main.min.css') }}" rel="stylesheet">
    <link rel="canonical" href="@yield('canonical', request()->url())"/>
</head>
<body>
<section class="login_form big_bg">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="title">Форма входа</div>
                    <div class="single_block">
                        <label for="email_field">Адрес электронной почты (e-mail)</label>
                        <input type="email" name="email" id="email_field" autocomplete="off" required value="{{ old('email') }}" autofocus>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                <b>{{ $message }}</b>
                            </span>
                        @enderror
                    </div>
                    <div class="single_block">
                        <label for="password_field">Пароль</label>
                        <input type="password" name="password" id="password_field" autocomplete="off" minlength="8">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                <b>{{ $message }}</b>
                            </span>
                        @enderror
                    </div>
                    <div class="single_block remember">
                        <input type="checkbox" name="remember" id="remember_field" {{ old('remember') ? 'checked' : '' }}>
                        <label for="remember_field">Запомнить меня</label>
                    </div>
                    <div class="single_block submit">
                        <button class="btn btn_send">
                            <svg>
                                <use xlink:href="../img/sprites/sprite.svg#sign-in"></use>
                            </svg>
                            Войти
                        </button>
                        @if (Route::has('password.request'))
                            <div class="recovery">
                                <a href="{{ route('password.request') }}">Забыли пароль?</a>
                            </div>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
</body>
</html>
