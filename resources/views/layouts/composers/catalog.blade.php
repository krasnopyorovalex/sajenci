@if(count($catalog))
<div class="catalog">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="title">Каталог товаров</div>
            </div>
        </div>
        <div class="row">
            @foreach($catalog as $catalogItem)
            <div class="col-6">
                <div class="catalog_item">
                    <div class="catalog_item-name"><a href="{{ $catalogItem->url }}">{{ $catalogItem->name }}</a></div>
                    <div class="catalog_item-list">
                        @if($catalogItem->catalogs)
                        <ul>
                            @foreach($catalogItem->catalogs as $catalogChild)
                            <li><a href="{{ $catalogChild->url }}">{{ $catalogChild->name }}</a></li>
                            @endforeach
                        </ul>
                        @endif
                    </div>
                    <div class="catalog_item-image">
                        {!! $catalogItem->getImage() !!}
                    </div>
                    <div class="btn_catalog">
                        <a href="{{ $catalogItem->url }}" class="btn btn_more">
                            <svg>
                                <use xlink:href="{{ asset('img/sprites/sprite.svg#right-arrow') }}"></use>
                            </svg>
                            Перейти в каталог
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endif
