@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <h1 class="mb-4">Продукт</h1>

        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <picture>
                        <source srcset="{{ asset('img/' . $product->img . '.avif') }}" type="image/avif">
                        <source srcset="{{ asset('img/' . $product->img . '.webp') }}" type="image/webp">
                        <source srcset="{{ asset('img/' . $product->img . '.png') }}" type="image/png">
                        <img src="{{ asset('img/' . $product->img . '.jpg') }}" class="card-img-top object-fit-contain p-3"
                            style="height: 220px;" alt="{{ $product->name }}">
                    </picture>
                    <div class="card-body d-flex flex-column text-center">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ $product->description }}</p>
                        <p class="card-text">Цена: {{ $product->price }} руб.</p>
                        <p class="card-text">Страна производителя: {{ $product->country }}</p>
                        <p class="card-text">Выпущено: {{ $product->release_at }}</p>
                        <p class="card-text">Модель: {{ $product->model }}</p>
                        <p class="card-text">Кол-во на складе: {{ $product->quantity }}</p>
                    </div>
                    @auth
                        @if ($cart->contains('product_id', $product->id))
                            <p class="m-auto">Кол-во: {{ $cart->firstWhere('product_id', $product->id)->quantity }}</p>
                            <div class="d-flex flex-row m-auto">
                                <form method="POST" action="{{ route('cart.update', $product->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="plus" value="1">
                                    <button class="btn btn-secondary me-1">+</button>
                                </form>
                                <form method="POST" action="{{ route('cart.update', $product->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="minus" value="1">
                                    <button class="btn btn-secondary me-1">-</button>
                                </form>
                            </div>
                        @else
                            <form class="mt-auto" method="POST" action="{{ route('cart.store') }}">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <button class="btn btn-primary w-100">Добавить</button>
                            </form>
                        @endif
                    @endauth
                </div>
            </div>
        </div>
    </div>
@endsection
