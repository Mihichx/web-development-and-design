@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <h1 class="m-5">Продукт</h1>

        <div class="row">
            <div class="col-md-12">
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
                        <!-- TODO: Сделать страна-производитель, год выпуска, модель -->
                    </div>
                    <!-- TODO: Сделать кнопку добавить и после прибавить или убавить после авторизации -->
                </div>
            </div>
        </div>
    </div>
@endsection
