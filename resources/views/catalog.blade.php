@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <h1 class="mb-4">Каталог</h1>

        <div class="row">
            <div class="col-md-12 mb-4">
                <form method="" class="d-flex" role="search"> {{-- POST --}}
                    <input class="form-control me-2" type="search" placeholder="Поиск" aria-label="Search" />
                    <button class="btn btn-outline-success" type="submit">Найти</button>
                </form>
            </div>
            <div class="col-md-4 mb-4">
                <form method="GET">
                    <select class="form-select" aria-label="Default select example"> <!-- TODO: Добавить name="sort_price" onchange="this.form.submit()" -->
                        <option selected>Сортировать по цене</option>
                        <option value="1">По возрастанию </option>
                        <option value="2">По убыванию</option>
                    </select>
                </form>
            </div>
            <div class="col-md-4 mb-4">
                <form method="GET">
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Сортировать по году</option>
                        <option value="1">По возрастанию</option>
                        <option value="2">По убыванию</option>
                    </select>
                </form>
            </div>
            <div class="col-md-4 mb-4">
                <form method="GET">
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Категории</option>
                        @foreach ($categories as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </form>
            </div>
        </div>

        <div class="row g-5 d-flex justify-content-center">
            @foreach ($products as $item)
                <div class="col-md-3">
                    <a href="{{ route('product', $item->id) }}" class="hover text-dark">
                        <div class="card h-100">
                            <picture>
                                <source srcset="{{ asset('img/' . $item->img . '.avif') }}" type="image/avif">
                                <source srcset="{{ asset('img/' . $item->img . '.webp') }}" type="image/webp">
                                <source srcset="{{ asset('img/' . $item->img . '.png') }}" type="image/png">
                                <img src="{{ asset('img/' . $item->img . '.jpg') }}" class="card-img-top object-fit-contain p-3"
                                    style="height: 220px;" alt="{{ $item->name }}">
                            </picture>
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">{{ $item->name }}</h5>
                                <p class="card-text">{{ $item->small_description }}</p>
                                <p class="card-text">Цена: {{ $item->price }} руб.</p>
                            </div>
                            <!-- TODO: Сделать кнопку добавить и после прибавить или убавить после авторизации -->
                        </div>
                    </a>
                </div>
            @endforeach
            <div class="d-flex justify-content-center">
                {{ $products->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
@endsection
