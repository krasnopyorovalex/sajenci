<div class="list">
    <div class="row" itemscope="" itemtype="http://schema.org/BlogPosting" itemprop="BlogPost">
        @foreach ($news as $new)
            <div class="col-3">
                <div class="list_item">
                    <div class="list_item-date">
                        <time itemprop="datePublished" datetime="{{ $new->published_at->format('c') }}">
                            {{ $new->published_at->formatLocalized('%d %B %Y') }}
                        </time>
                    </div>
                    @if($new->image)
                        <div class="list_item-image">
                            <picture>
                                <a href="{{ $new->url }}">
                                    <img itemprop="url contentUrl" src="{{ asset($new->image->path) }}" alt="{{ $new->image->alt }}" title="{{ $new->image->title }}" />
                                    <meta itemprop="url" content="{{ asset($new->image->path) }}">
                                    <meta itemprop="width" content="320">
                                    <meta itemprop="height" content="320">
                                </a>
                            </picture>
                        </div>
                    @endif
                    <div class="list_item-name">
                        <a href="{{ $new->url }}">У нас новый сайт</a>
                    </div>
                    <div class="list_item-text" itemprop="articleBody">
                        {!! $new->preview !!}
                    </div>
                    <div class="center">
                        <a href="{{ $new->url }}" class="btn btn_more">
                            <svg>
                                <use xlink:href="{{ asset('img/sprites/sprite.svg#right-arrow') }}"></use>
                            </svg>
                            Подробнее
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="row">
        <div class="col-12">
            <div class="pagination">
                {{ $news->links() }}
            </div>
        </div>
    </div>
</div>
