<!DOCTYPE html>
<html lang="ru-RU" prefix="og: http://ogp.me/ns#">
<head>
    @section('title', 'Форма входа в личный кабинет')
    @section('description', '')
    @include('layouts.partials.head')
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
                                <use xlink:href="{{ asset('img/sprites/sprite.svg#sign-in') }}"></use>
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
