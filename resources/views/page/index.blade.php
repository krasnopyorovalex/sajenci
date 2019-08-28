@extends('layouts.app')

@section('title', $page->title)
@section('description', $page->description)
@push('og')
<meta property="og:title" content="{{ $page->title }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ request()->getUri() }}">
    <meta property="og:image" content="{{ asset($page->image ? $page->image->path : 'images/logo.png') }}">
    <meta property="og:description" content="{{ $page->description }}">
    <meta property="og:site_name" content="Саженцы в Крыму">
    <meta property="og:locale" content="ru_RU">
@endpush

@section('content')

    @includeWhen($page->slider, 'layouts.sections.slider', ['slider' => $page->slider])

    <section class="advantages">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="title">Почему стоит покупать у нас?</div>
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <div class="advantages_item">
                        <div class="advantages_item-head">
                            <svg>
                                <use xlink:href="../img/sprites/sprite.svg#wallet"></use>
                            </svg>
                            <div class="advantages_item-head-name">
                                Доступные цены
                            </div>
                        </div>
                        <div class="advantages_item-line"></div>
                        <p>Мы вынуждены отталкиваться от того, что понимание сути ресурсосберегающих технологий требует анализа прогресса профессионального сообщества.</p>
                    </div>
                </div>
                <div class="col-3">
                    <div class="advantages_item">
                        <div class="advantages_item-head">
                            <svg>
                                <use xlink:href="../img/sprites/sprite.svg#like"></use>
                            </svg>
                            <div class="advantages_item-head-name">
                                Высокое качество товара
                            </div>
                        </div>
                        <div class="advantages_item-line"></div>
                        <p>Но укрепление и развитие внутренней структуры однозначно фиксирует необходимость глубокомысленных рассуждений.</p>
                    </div>
                </div>
                <div class="col-3">
                    <div class="advantages_item">
                        <div class="advantages_item-head">
                            <svg>
                                <use xlink:href="../img/sprites/sprite.svg#discount"></use>
                            </svg>
                            <div class="advantages_item-head-name">
                                Скидки и акции
                            </div>
                        </div>
                        <div class="advantages_item-line"></div>
                        <p>Не следует, однако, забывать, что существующая теория предоставляет широкие возможности для модели развития.</p>
                    </div>
                </div>
                <div class="col-3">
                    <div class="advantages_item">
                        <div class="advantages_item-head">
                            <svg>
                                <use xlink:href="../img/sprites/sprite.svg#truck"></use>
                            </svg>
                            <div class="advantages_item-head-name">
                                Быстрая доставка
                            </div>
                        </div>
                        <div class="advantages_item-line"></div>
                        <p>Для современного мира дальнейшее развитие различных форм деятельности позволяет оценить значение дальнейших направлений развития.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="about">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="text">
                        <h1>{{ $page->name }}</h1>
                        {!! $page->text !!}
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('layouts.composers.catalog')

    <section class="popular">
        <div class="container">
            <div class="row">
                <div class="col-4 align_fs">
                    <div class="popular_slider">
                        <div class="frame js_frame">
                            <ul class="slides js_slides">
                                <li class="js_slide decorate">
                                    <div class="label label_discount">
                                        <div>Хит продаж</div>
                                    </div>
                                    <a href="#">
                                        <img src="../img/p_slide-01.jpg" alt="">
                                    </a>
                                    <div class="popular_slider-info">
                                        <a href="#" class="name">Ежевика крымская</a>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus dicta fugit iusto modi recusandae, vel voluptatibus! Accusantium amet aperiam atque ea est excepturi illum magni nisi quaerat suscipit! A, porro.</p>
                                        <div class="more_box">
                                            <a href="#" class="btn btn_more">
                                                <svg>
                                                    <use xlink:href="../img/sprites/sprite.svg#right-arrow"></use>
                                                </svg>
                                                Подробнее
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                <li class="js_slide decorate">
                                    <div class="label label_action">
                                        <div>Скидка - 40%</div>
                                    </div>
                                    <a href="#">
                                        <img src="../img/p_slide-02.jpg" alt="">
                                    </a>
                                    <div class="popular_slider-info">
                                        <a href="#" class="name">Абрикос</a>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus dicta fugit iusto modi recusandae, vel voluptatibus! Accusantium amet aperiam atque ea est excepturi illum magni nisi quaerat suscipit! A, porro.</p>
                                        <div class="more_box">
                                            <a href="#" class="btn btn_more">
                                                <svg>
                                                    <use xlink:href="../img/sprites/sprite.svg#right-arrow"></use>
                                                </svg>
                                                Подробнее
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                <li class="js_slide decorate">
                                    <div class="label label_new">
                                        <div>Новинка</div>
                                    </div>
                                    <a href="#">
                                        <img src="../img/p_slide-03.jpg" alt="">
                                    </a>
                                    <div class="popular_slider-info">
                                        <a href="#" class="name">Липа обычная</a>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus dicta fugit iusto modi recusandae, vel voluptatibus! Accusantium amet aperiam atque ea est excepturi illum magni nisi quaerat suscipit! A, porro.</p>
                                        <div class="more_box">
                                            <a href="#" class="btn btn_more">
                                                <svg>
                                                    <use xlink:href="../img/sprites/sprite.svg#right-arrow"></use>
                                                </svg>
                                                Подробнее
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                <li class="js_slide decorate">
                                    <a href="#">
                                        <img src="../img/p_slide-04.jpg" alt="">
                                    </a>
                                    <div class="popular_slider-info">
                                        <a href="#" class="name">Саженцы черешни</a>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus dicta fugit iusto modi recusandae, vel voluptatibus! Accusantium amet aperiam atque ea est excepturi illum magni nisi quaerat suscipit! A, porro.</p>
                                        <div class="more_box">
                                            <a href="#" class="btn btn_more">
                                                <svg>
                                                    <use xlink:href="../img/sprites/sprite.svg#right-arrow"></use>
                                                </svg>
                                                Подробнее
                                            </a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <span class="js_prev prev">
                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 501.5 501.5"><g><path fill="#c6a770" d="M302.67 90.877l55.77 55.508L254.575 250.75 358.44 355.116l-55.77 55.506L143.56 250.75z"/></g></svg>
                    </span>

                        <span class="js_next next">
                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 501.5 501.5"><g><path fill="#c6a770" d="M199.33 410.622l-55.77-55.508L247.425 250.75 143.56 146.384l55.77-55.507L358.44 250.75z"/></g></svg>
                    </span>
                    </div>
                </div>
                <div class="col-4 align_fs">
                    @include('layouts.composers.articles')
                </div>
                <div class="col-4 align_fs">
                    <div class="form_callback decorate">
                        <form action="{{ route('send.callback') }}" id="form_callback">
                            @csrf
                            <div class="title">Форма обратной связи</div>
                            <div class="info">Оставьте Ваш номер телефона и мы перезвоним в ближайшее время</div>
                            <div class="single_block">
                                <input type="text" name="name" placeholder="Ваше имя*" autocomplete="off" minlength="3" required>
                            </div>
                            <div class="single_block">
                                <input type="text" name="phone" placeholder="Ваш телефон*" autocomplete="off" required>
                            </div>
                            <div class="single_block">
                                <textarea name="message" placeholder="Дополнительная информация"></textarea>
                            </div>
                            <div class="single_block i_agree">
                                <input type="checkbox" name="agree" id="i_agree" value="1" checked="checked">
                                <label for="i_agree">Оставляя заявку, Вы соглашаетесь на обработку персональных данных</label>
                                <p class="error">Согласитесь на обработку персональных данных</p>
                            </div>
                            <div class="single_block submit">
                                <button class="btn btn_send">
                                    <svg>
                                        <use xlink:href="../img/sprites/sprite.svg#send"></use>
                                    </svg>
                                    Отправить
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
