<!DOCTYPE html>
<html lang="ru-RU" prefix="og: http://ogp.me/ns#">
<head>
    @section('title', 'Форма регистрации')
    @section('description', '')
    @include('layouts.partials.head')
</head>
<body>
<section class="login_form big_bg">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form method="POST" action="{{ route('register') }}" class="register">
                @csrf
                <div class="title">Форма регистрации</div>

                    <div class="single_block">
                        <label for="name_field">Ваше имя:</label>
                        <input type="text" name="name" id="name_field" autocomplete="off" required value="{{ old('name') }}" autofocus>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                <b>{{ $message }}</b>
                            </span>
                        @enderror
                    </div>

                    <div class="single_block">
                        <label for="email_field">Ваше email:</label>
                        <input type="text" name="email" id="email_field" autocomplete="email" required value="{{ old('email') }}">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                <b>{{ $message }}</b>
                            </span>
                        @enderror
                    </div>

                    <div class="single_block">
                        <label for="password_field">Ваш пароль:</label>
                        <input type="password" name="password" id="password_field" required autocomplete="new-password" minlength="8">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                <b>{{ $message }}</b>
                            </span>
                        @enderror
                    </div>

                    <div class="single_block">
                        <label for="password-confirm_field">Повторите Ваш пароль:</label>
                        <input type="password" name="password_confirmation" id="password-confirm_field" required autocomplete="new-password" minlength="8">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                <b>{{ $message }}</b>
                            </span>
                        @enderror
                    </div>

                    <div class="single_block submit">
                        <button class="btn btn_send">
                            <svg>
                                <use xlink:href="{{ asset('img/sprites/sprite.svg#add-user') }}"></use>
                            </svg>
                            Зарегистрироваться
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</section>
</body>
</html>
