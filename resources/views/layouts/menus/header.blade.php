<nav itemscope="" itemtype="http://schema.org/SiteNavigationElement">
    <ul>
        @foreach($menu->get('menu_header') as $item)
            <li{!! add_css_class($item) !!}>
                <a itemprop="url" href="{{ $item->link }}">{{ $item->name }}</a>
                @if ($item->is_service && $services->count())
                    <ul>
                        @foreach ($services as $service)
                            <li>
                                <a itemprop="url" href="{{ route('service.show', $service->alias) }}">{{ $service->getMenuName() }}</a>
                                <span><i></i></span>
                                @if ($service->services->count())
                                    <ul>
                                        @foreach ($service->services as $subService)
                                            <li><a itemprop="url" href="{{ route('service.show', $subService->alias) }}">{{ $subService->getMenuName() }}</a></li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                @endif
            </li>
        @endforeach
    </ul>
</nav>
