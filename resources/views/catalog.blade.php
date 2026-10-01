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
                        <option value="0">Сортировать по цене</option>
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
                        @foreach ($categories as $item)
                            <option value="{{ $item->id }}"
                                {{ request('sort_category') == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </form>

        <div class="row g-5 d-flex justify-content-center">
            @foreach ($products as $item)
                <div class="col-md-3">
                    <div class="card h-100">
                        <a href="{{ route('products') . '/' . $item->id }}" class="hover text-dark">
                            <picture>
                                <source srcset="{{ asset('img/' . $item->img . '.avif') }}" type="image/avif">
                                <source srcset="{{ asset('img/' . $item->img . '.webp') }}" type="image/webp">
                                <source srcset="{{ asset('img/' . $item->img . '.png') }}" type="image/png">
                                <img src="{{ asset('img/' . $item->img . '.jpg') }}"
                                    class="card-img-top object-fit-contain p-3" style="height: 220px;"
                                    alt="{{ $item->name }}">
                            </picture>
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">{{ $item->name }}</h5>
                                <p class="card-text">{{ $item->small_description }}</p>
                                <p class="card-text">Цена: {{ $item->price }} руб.</p>
                            </div>
                        </a>
                        @auth
                            <button class="btn btn-primary">Добавить</button>
                        @endauth
                        <!-- TODO: Сделать рабочую кнопку, после добавление появиться + или - -->
                    </div>
                </div>
            @endforeach
            <div class="d-flex justify-content-center">
                {{ $products->withQueryString()->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
@endsection
