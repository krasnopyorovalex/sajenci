<!DOCTYPE html>
<html lang="ru-RU" prefix="og: http://ogp.me/ns#">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimal-ui">
    <title>@yield('title', 'Продажа саженцев в Крыму')</title>
    <meta name="description" content="@yield('description', '')">
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
    @stack('og')
    <link href="{{ asset('css/main.min.css') }}" rel="stylesheet">
    <link rel="canonical" href="@yield('canonical', request()->url())"/>
</head>
<body>
    <section class="login">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @if (Route::has('login'))
                    <div class="login_box">
                        <ul>
                            @auth
                                <li>
                                    <a href="{{ route('cabinet.index') }}">
                                        <svg>
                                            <use xlink:href="{{ asset('img/sprites/sprite.svg#avatar') }}"></use>
                                        </svg>
                                        {{ auth()->user()->name }}
                                    </a>
                                </li>
                                <li>
                                    <form action="{{ route('logout') }}" method="post">
                                        {{ csrf_field() }}
                                        <div class="submit">
                                            <svg>
                                                <use xlink:href="{{ asset('img/sprites/sprite.svg#exit') }}"></use>
                                            </svg>
                                            <button type="submit">Выйти</button>
                                        </div>
                                    </form>
                                </li>
                            @else
                                <li>
                                    <a href="{{ route('login') }}">
                                        <svg>
                                            <use xlink:href="{{ asset('img/sprites/sprite.svg#sign-in') }}"></use>
                                        </svg>
                                        Вход
                                    </a>
                                </li>
                                <li>
                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}">
                                            <svg>
                                                <use xlink:href="{{ asset('img/sprites/sprite.svg#add-user') }}"></use>
                                            </svg>
                                            Регистрация
                                        </a>
                                    @endif
                                </li>
                            @endauth
                        </ul>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <header id="header">
        <meta itemprop="headline" content="#">
        <meta itemprop="description" content="#">
        <meta itemprop="keywords" content="#">
        <div class="container">
            <div class="row">
                <div class="col-3">
                    <div class="logo">
                        <a href="/">
                            <img src="{{ asset('img/logo.svg') }}" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-9 contacts">
                    <div>
                        <div class="icon_box">
                            <i class="icon icon_mail"></i>
                        </div>
                        <span><a href="mailto:info@sajenci-krym.ru">info@sajenci-krym.ru</a></span>
                    </div>
                    <div>
                        <div class="icon_box">
                            <i class="icon icon_callback"></i>
                        </div>
                        <span class="callback">Обратный звонок</span>
                    </div>
                    <div class="phone">
                        <div class="icon_box">
                            <i class="icon icon_phone"></i>
                        </div>
                        <a href="tel:+79153333345"><span>+7 (915)</span> 333-33-45</a>
                    </div>
                    <div class="cart with_leaf">
                        <a href="{{ route('page.show', ['alias' => 'cart']) }}">
                            <div class="icon_box">
                                <i class="icon icon_cart"></i>
                            </div>
                            Корзина пуста
                        </a>
                        <div class="cart_count">0</div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section class="navigation with_leaf">
        <div class="container">
            <div class="row">
                <div class="col-3">
                    @include('layouts.composers.box_catalog')
                </div>
                <div class="col-6">
                    @includeWhen($menu->get('menu_header'), 'layouts.menus.header', ['menu' => $menu])
                </div>
                <div class="col-3">
                    <div class="search">
                        <form action="#">
                            <div class="single_block">
                                <input type="text" name="keyword" placeholder="Поиск по сайту" autocomplete="off">
                                <button class="submit" type="submit">
                                    <i class="icon icon_search"></i>
                                    Найти
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @yield('content')

    <footer class="with_leaf">
        <div class="container">
            <div class="row">
                <div class="col-3">
                    <div class="title">Наши контакты</div>
                    <ul class="contacts">
                        <li>
                            <div class="icon_box">
                                <i class="icon icon_phone"></i>
                            </div>
                            <a href="#">
                                +7 (978) 545 88 10
                            </a>
                        </li>
                        <li>
                            <div class="icon_box">
                                <i class="icon icon_mail"></i>
                            </div>
                            <a href="mailto:lora.pulm@gmail.com">
                                lora.pulm@gmail.com
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-6">
                    <div class="title">Полезная информация</div>
                    @includeWhen($menu->get('menu_footer'), 'layouts.menus.footer', ['menu' => $menu])
                </div>
                <div class="col-3 text_right">
                    <div class="title">Мы в соцсетях</div>
                    <div class="socials">
                        <ul>
                            <li>
                                <a href="#" rel="noopener noreferrer">
                                    <svg>
                                        <use xlink:href="{{ asset('img/sprites/sprite.svg#ok') }}"></use>
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a href="#" rel="noopener noreferrer">
                                    <svg>
                                        <use xlink:href="{{ asset('img/sprites/sprite.svg#twitter') }}"></use>
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a href="#" rel="noopener noreferrer">
                                    <svg>
                                        <use xlink:href="{{ asset('img/sprites/sprite.svg#fb') }}"></use>
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a href="#" rel="noopener noreferrer">
                                    <svg>
                                        <use xlink:href="{{ asset('img/sprites/sprite.svg#insta') }}"></use>
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a href="#" rel="noopener noreferrer">
                                    <svg>
                                        <use xlink:href="{{ asset('img/sprites/sprite.svg#vk') }}"></use>
                                    </svg>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="separator"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-6 as_center">
                    <div class="copyright">&copy; {{ date('Y') }} Саженцы в Крыму. Все права защищены.</div>
                </div>
                <div class="col-6">
                    <div class="developer">
                        <div class="developer_link">
                            <a href="https://krasber.ru" target="_blank" rel="nofollow">
                                Создание, продвижение и <br>техподдержка сайтов
                            </a>
                        </div>
                        <div class="developer_logo">
                            <a href="https://krasber.ru" target="_blank" rel="nofollow">
                                <img src="{{ asset('img/krasber.svg') }}" alt="Веб-студия Красбер">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    @include('layouts.forms.popup')

    <script src="{{ asset('js/main.min.js') }}"></script>
    <script src="{{ asset('js/vendor.min.js') }}"></script>
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
