<nav itemscope="" itemtype="http://schema.org/SiteNavigationElement">
    <ul>
        @foreach($menu->get('menu_header') as $item)
            <li{!! add_css_class($item) !!}>
                <a itemprop="url" href="{{ $item->link }}">{{ $item->name }}</a>
            </li>
        @endforeach
    </ul>
    <div class="btn_toggle">
        <span></span>
    </div>
    <div class="close" title="Закрыть меню">
        <svg>
            <use xlink:href="{{ asset('img/sprites/sprite.svg#close') }}"></use>
        </svg>
    </div>
</nav>
