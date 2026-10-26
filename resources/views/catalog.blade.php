@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <h1 class="mb-4">Каталог</h1>

        <form method="GET">
            <div class="row">
                <div class="col-md-12 mb-4">
                    <div class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Поиск" aria-label="Search" name="search"
                            value="{{ request('search') }}">
                        <button class="btn btn-outline-success" type="submit">Найти</button>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <select class="form-select" aria-label="Default select example" name="sort_price"
                        onchange="this.form.submit()">
                        <option value="0" selected>Сортировать по цене</option>
                        <option value="1" {{ request('sort_price') == 1 ? 'selected' : '' }}>По возрастанию</option>
                        <option value="2" {{ request('sort_price') == 2 ? 'selected' : '' }}>По убыванию</option>
                    </select>
                </div>
                <div class="col-md-4 mb-4">
                    <select class="form-select" aria-label="Default select example" name="sort_year"
                        onchange="this.form.submit()">
                        <option value="0" selected>Сортировать по году</option>
                        <option value="1" {{ request('sort_year') == 1 ? 'selected' : '' }}>Новые</option>
                        <option value="2" {{ request('sort_year') == 2 ? 'selected' : '' }}>Старые</option>
                    </select>
                </div>
                <div class="col-md-4 mb-4">
                    <select class="form-select" aria-label="Default select example" name="sort_category"
                        onchange="this.form.submit()">
                        <option value="0" selected>Категории</option>
                        @foreach ($categories as $product)
                            <option value="{{ $product->id }}"
                                {{ request('sort_category') == $product->id ? 'selected' : '' }}>{{ $product->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </form>

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
            @foreach ($products as $product)
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
            @endforeach
            <div class="d-flex justify-content-center">
                {{ $products->withQueryString()->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
@endsection
