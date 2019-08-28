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
    <section>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumbs">
                        <ul>
                            <li><a href="{{ route('page.show') }}">Главная</a></li>
                            <li>{{ $catalog->name }}</li>
                        </ul>
                    </div>

                    <div class="text">
                        {!! $catalog->text !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
