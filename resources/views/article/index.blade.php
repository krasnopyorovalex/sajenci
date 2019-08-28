@extends('layouts.app')

@section('title', $article->title)
@section('description', $article->description)
@push('og')
    <meta property="og:title" content="{{ $article->title }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ request()->getUri() }}">
    <meta property="og:image" content="{{ asset('images/logo.png') }}">
    <meta property="og:description" content="{{ $article->description }}">
    <meta property="og:site_name" content="Саженцы в Крыму">
    <meta property="og:locale" content="ru_RU">
@endpush

@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumbs">
                        <ul>
                            <li><a href="{{ route('page.show') }}">Главная</a></li>
                            <li><a href="{{ route('page.show', ['alias' => 'articles']) }}">Полезная информация</a></li>
                            <li>{{ $article->name }}</li>
                        </ul>
                    </div>

                    <div class="text">
                        <h1>{{ $article->name }}</h1>
                        {!! $article->text !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
