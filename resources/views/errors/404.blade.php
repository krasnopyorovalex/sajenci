<!DOCTYPE html>
<html lang="ru-RU" prefix="og: http://ogp.me/ns#">
<head>
    @section('title', '404 - страница не найдена')
    @section('description', 'Запрашиваемая страница отсутствует на сайте')
    @include('layouts.partials.head')
</head>
<body>
    <section class="error_404 big_bg">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="error_404-body">
                        <img src="{{ asset('img/404.png') }}" alt="страница не найдена">
                        <p>УПС! Запрашиваемая Вами страница не найдена</p>
                        <a href="{{ route('page.show') }}" class="btn btn_more">
                            <svg>
                                <use xlink:href="{{ asset('img/sprites/sprite.svg#right-arrow') }}"></use>
                            </svg>
                            Перейти на главную
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
