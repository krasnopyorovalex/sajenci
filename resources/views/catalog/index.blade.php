@extends('layouts.app')

@section('title', $catalog->title)
@section('description', $catalog->description)
@push('og')
    <meta property="og:title" content="{{ $catalog->title }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ request()->getUri() }}">
    <meta property="og:image" content="{{ asset('images/logo.png') }}">
    <meta property="og:description" content="{{ $catalog->description }}">
    <meta property="og:site_name" content="Саженцы в Крыму">
    <meta property="og:locale" content="ru_RU">
@endpush

@section('content')
    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-3 align_fs">
                    @include('layouts.composers.catalog_left_sb')
                </div>
                <div class="col-9 align_fs">
                    <div class="breadcrumbs">
                        <ul>
                            <li><a href="{{ route('page.show') }}">Главная</a></li>
                            @if($catalog->parent)
                                <li><a href="{{ $catalog->parent->url }}">{{ $catalog->parent->name }}</a></li>
                            @endif
                            <li>{{ $catalog->name }}</li>
                        </ul>
                    </div>

                    @if(count($products))
                    <div class="sort">
                        <form action="{{ request()->getUri() }}" method="get">
                            <div class="single_block">
                                <label for="sort_field">Сортировать по:</label>
                                <select id="sort_field" name="sort">
                                    <option value="">Не выбрано</option>
                                    <option value="price_desc" {{ request('sort') === 'price_desc' ? 'selected' : '' }}>По убыванию цены</option>
                                    <option value="price_asc" {{ request('sort') === 'price_asc' ? 'selected' : '' }}>По возрастанию цены</option>
                                </select>
                            </div>
                        </form>
                    </div>
                    @endif

                    <h1>{{ $catalog->name }}</h1>
                    <div class="row products">
                        <div class="col-4">
                            <div class="products_item">
                                <div class="label label_discount">
                                    <div>Скидка - 40%</div>
                                </div>
                                <figure>
                                    <a href="product.html">
                                        <img src="../img/catalog-01.jpg" alt="product" />
                                    </a>
                                </figure>
                                <div class="products_item-info">
                                    <div class="products_item-info-name">
                                        <a href="product.html">Саженцы пихты обыкновенной</a>
                                    </div>
                                    <div class="products_item-info-buy">
                                        <div class="price">
                                            <span>8 000</span> &#x20bd;
                                        </div>
                                        <div class="btn btn_buy" data-id="1">
                                            <svg>
                                                <use xlink:href="../img/sprites/sprite.svg#add"></use>
                                            </svg>
                                            Купить
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="pagination">
                        <ul>
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li class="active">4</li>
                            <li><a href="#">5</a></li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
