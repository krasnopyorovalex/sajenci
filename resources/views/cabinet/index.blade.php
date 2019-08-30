@extends('layouts.app')

@section('title', 'Личный кабинет пользователя')
@section('description', 'На сттранице представлены основные разделы личного кабинета пользвателя')

@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumbs">
                        <ul>
                            <li><a href="{{ route('page.show') }}">Главная</a></li>
                            <li>Личный кабинет</li>
                        </ul>
                    </div>

                    <div class="text">
                        ///
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
