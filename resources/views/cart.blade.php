@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <h1 class="mb-4">Корзина</h1>

        <div class="row">
            <div class="col-md-3 mb-4">
                <div class="card h-100">
                    <div class="card-body d-flex flex-row">
                        <h5 class="card-title me-2 mb-0">Всего товаров:</h5>
                        <p class="card-text">{{ $count }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="card h-100">
                    <div class="card-body d-flex flex-row">
                        <h5 class="card-title me-2 mb-0">Итого:</h5>
                        <p class="card-text">{{ $sum }} руб.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                @if (!$cartProducts->isEmpty())
                    <form method="POST" action="{{ route('cart.clear') }}"
                        onsubmit="return confirm('Вы уверены, что хотите очистить всю корзину?');">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger w-100">Очистить</button>
                    </form>
                @else
                    <button class="btn btn-close-white border-1 border-black w-100">Очистить</button>
                @endif
            </div>
            <div class="col-md-3 mb-4">
                @if (!$cartProducts->isEmpty())
                    <form method="POST">
                        @csrf
                        <input type="hidden" name="order" value="1">
                        <button class="btn btn-success w-100">Оформить</button>
                    </form>
                @else
                    <button class="btn btn-close-white border-1 border-black w-100">Оформить</button>
                @endif
            </div>
        </div>

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @elseif (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif  

        <div class="row g-5 d-flex justify-content-center">
            @if ($cartProducts->isNotEmpty())
                @foreach ($cartProducts as $cartProduct)
                    @php
                        $product = $cartProduct->product;
                    @endphp
                    <div class="col-md-3">
                        <div class="card h-100">
                            <a href="{{ route('catalog.show', $product->id) }}" class="hover text-dark">
                                <picture>
                                    <source srcset="{{ asset('img/' . $product->img . '.avif') }}" type="image/avif">
                                    <source srcset="{{ asset('img/' . $product->img . '.webp') }}" type="image/webp">
                                    <source srcset="{{ asset('img/' . $product->img . '.png') }}" type="image/png">
                                    <img src="{{ asset('img/' . $product->img . '.jpg') }}"
                                        class="card-img-top object-fit-contain p-3" style="height: 220px;"
                                        alt="{{ $product->name }}">
                                </picture>
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title">{{ $product->name }}</h5>
                                    <p class="card-text">{{ $product->small_description }}</p>
                                    <p class="card-text">Цена: {{ $product->price }} руб.</p>
                                    <p class="card-text">Кол-во на складе: {{ $product->quantity }}</p>
                                </div>
                            </a>
                            @auth
                                <p class="m-auto">Кол-во: {{ $cartProduct->quantity }}</p>
                                <div class="d-flex flex-row m-auto">
                                    <form method="POST" action="{{ route('cart.update', $product->id) }}">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="return_url" value="{{ request()->fullUrl() }}">
                                        <input type="hidden" name="plus" value="1">
                                        <button class="btn btn-secondary me-1">+</button>
                                    </form>
                                    <form method="POST" action="{{ route('cart.update', $product->id) }}">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="return_url" value="{{ request()->fullUrl() }}">
                                        <input type="hidden" name="minus" value="1">
                                        <button class="btn btn-secondary me-1">-</button>
                                    </form>
                                </div>
                            @endauth
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection
