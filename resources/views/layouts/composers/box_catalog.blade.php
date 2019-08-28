<div class="box_catalog">
    <div class="btn">
        каталог товаров
    </div>
    <div class="btn_toggle">
        <span></span>
    </div>
    <div class="box_catalog-list">
        @if(count($catalog))
        <ul>
            @foreach($catalog as $catalogItem)
            <li>
                <a href="{{ $catalogItem->url }}">{{ $catalogItem->name }}</a>
                @if($catalogItem->catalogs)
                <span><i class="icon icon_arrow"></i></span>
                <ul>
                    @foreach($catalogItem->catalogs as $catalogChild)
                    <li><a href="{{ $catalogChild->url }}">{{ $catalogChild->name }}</a></li>
                    @endforeach
                </ul>
                @endif
            </li>
            @endforeach
        </ul>
        @endif
    </div>
</div>
