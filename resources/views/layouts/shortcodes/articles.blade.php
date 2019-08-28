<div class="list">
    <div class="row list" itemscope="" itemtype="http://schema.org/BlogPosting" itemprop="BlogPost">
        @foreach ($articles as $article)
            <div class="col-3">
                <div class="list_item">
                    <div class="list_item-date">
                        <time itemprop="datePublished" datetime="{{ $article->published_at->format('c') }}">
                            {{ $article->published_at->formatLocalized('%d %B %Y') }}
                        </time>
                    </div>
                    @if($article->image)
                        <div class="list_item-image">
                            <picture>
                                <a href="{{ $article->url }}">
                                    <img itemprop="url contentUrl" src="{{ asset($article->image->path) }}" alt="{{ $article->image->alt }}" title="{{ $article->image->title }}" />
                                    <meta itemprop="url" content="{{ asset($article->image->path) }}">
                                    <meta itemprop="width" content="320">
                                    <meta itemprop="height" content="320">
                                </a>
                            </picture>
                        </div>
                    @endif
                    <div class="list_item-name">
                        <a href="{{ $article->url }}">{{ $article->name }}</a>
                    </div>
                    <div class="list_item-text" itemprop="articleBody">
                        {!! $article->preview !!}
                    </div>
                    <div class="center">
                        <a href="{{ $article->url }}" class="btn btn_more">
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
    {{ $articles->links() }}
</div>
