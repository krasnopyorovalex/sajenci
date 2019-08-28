@if(count($articles))
<div class="articles">
    @foreach($articles as $article)
    <div class="articles_item decorate">
        @if($article->image)
        <div class="articles_item-image">
            <a href="{{ $article->url }}">
                <img src="{{ $article->image->path }}" alt="{{ $article->image->alt }}" title="{{ $article->image->title }}">
            </a>
        </div>
        @endif
        <div class="articles_item-preview">
            <a href="{{ $article->url }}" class="name">{{ $article->name }}</a>
            <div class="body">
                {{ $article->getPreview() }}
            </div>
        </div>
    </div>
    @endforeach
    <div class="btn_box">
        <a href="{{ route('page.show', ['alias' => 'articles']) }}" class="btn btn_more">
            <svg>
                <use xlink:href="{{ asset('img/sprites/sprite.svg#right-arrow') }}"></use>
            </svg>
            Читать все статьи
        </a>
    </div>
</div>
@endif
