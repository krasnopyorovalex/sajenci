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

                <form action="{{ route('password.email') }}" method="post">
                    @csrf

                    <div class="title">Форма сброса пароля</div>

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            <svg>
                                <use xlink:href="../img/sprites/sprite.svg#alert"></use>
                            </svg>
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="single_block">
                        <label for="email_field">Адрес электронной почты (e-mail)</label>
                        <input type="email" name="email" id="email_field" autocomplete="off" required value="{{ old('email') }}" autofocus>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                <b>{{ $message }}</b>
                            </span>
                        @enderror
                    </div>
                    <div class="single_block submit">
                        <button class="btn btn_send">
                            <svg>
                                <use xlink:href="{{ asset('img/sprites/sprite.svg#reset') }}"></use>
                            </svg>
                            Сбросить
                        </button>
                    </div>
                    <div class="single_block back">
                        <a href="{{ route('page.show') }}" class="btn btn_send">
                            <svg>
                                <use xlink:href="{{ asset('img/sprites/sprite.svg#return') }}"></use>
                            </svg>
                            На главную
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
</body>
</html>
