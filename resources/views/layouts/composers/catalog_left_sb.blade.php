@if(count($catalog))
    <div class="categories">
        <ul>
            @foreach($catalog as $catalogItem)
                <li{!! $catalogItem->isActive(request('alias')) ? ' class="active"' : '' !!}>
                    <a href="{{ $catalogItem->url }}">{{ $catalogItem->name }}</a>
                    @if($catalogItem->catalogs)
                        <ul>
                            @foreach($catalogItem->catalogs as $catalogChild)
                                <li{!! $catalogChild->isActive(request('alias')) ? ' class="active"' : '' !!}><a href="{{ $catalogChild->url }}">{{ $catalogChild->name }}</a></li>
                            @endforeach
                        </ul>
                    @endif
                </li>
            @endforeach
        </ul>
    </div>
@endif
