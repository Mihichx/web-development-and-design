@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <h1 class="mb-4">Продукт</h1>

        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <picture>
                        <source srcset="{{ asset('img/' . $item->img . '.avif') }}" type="image/avif">
                        <source srcset="{{ asset('img/' . $item->img . '.webp') }}" type="image/webp">
                        <source srcset="{{ asset('img/' . $item->img . '.png') }}" type="image/png">
                        <img src="{{ asset('img/' . $item->img . '.jpg') }}" class="card-img-top object-fit-contain p-3"
                            style="height: 220px;" alt="{{ $item->name }}">
                    </picture>
                    <div class="card-body d-flex flex-column text-center">
                        <h5 class="card-title">{{ $item->name }}</h5>
                        <p class="card-text">{{ $item->description }}</p>
                        <p class="card-text">Цена: {{ $item->price }} руб.</p>
                        <p class="card-text">Страна производителя: {{ $item->country }}</p>
                        <p class="card-text">Выпущено: {{ $item->release_at }}</p>
                        <p class="card-text">Модель: {{ $item->model }}</p>
                    </div>
                    @auth
                        <button class="btn btn-primary">Добавить</button>
                    @endauth
                    <!-- TODO: Сделать рабочую кнопку, после добавление появиться + или - -->
                </div>
            </div>
        </div>
    </div>
@endsection
