<!DOCTYPE html>
<html lang="ru-RU" prefix="og: http://ogp.me/ns#">
<head>
    @section('title', 'Форма входа в личный кабинет')
    @section('description', '')
    @include('layouts.partials.head')
</head>
<body>
<section class="password_form big_bg">
    <div class="container">
        <div class="row">
            <div class="col-12">

                <form action="{{ route('password.update') }}" method="post">
                    @csrf

                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="title">Форма обновления пароля</div>

                    <div class="single_block">
                        <label for="email_field">Адрес электронной почты (e-mail)</label>
                        <input type="email" name="email" id="email_field" autocomplete="off" required value="{{ $email ?? old('email') }}" autofocus>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                <b>{{ $message }}</b>
                            </span>
                        @enderror
                    </div>
                    <div class="single_block">
                        <label for="password_field">Ваш новый пароль:</label>
                        <input type="password" name="password" id="password_field" required autocomplete="new-password" minlength="8">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                <b>{{ $message }}</b>
                            </span>
                        @enderror
                    </div>

                    <div class="single_block">
                        <label for="password-confirm_field">Повторите Ваш новый пароль:</label>
                        <input type="password" name="password_confirmation" id="password-confirm_field" required autocomplete="new-password" minlength="8">
                    </div>

                    <div class="single_block submit">
                        <button class="btn btn_send">
                            <svg>
                                <use xlink:href="{{ asset('img/sprites/sprite.svg#reset') }}"></use>
                            </svg>
                            Сбросить
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
</body>
</html>
