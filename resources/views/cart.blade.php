@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <h1 class="mb-4">Корзина</h1>

        <div class="row">
            <div class="col-md-3 mb-4">
                <div class="card h-100">
                    <div class="card-body d-flex flex-row">
                        <h5 class="card-title me-2 mb-0">Всего товаров:</h5>
                        <p class="card-text">5</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="card h-100">
                    <div class="card-body d-flex flex-row">
                        <h5 class="card-title me-2 mb-0">Итого:</h5>
                        <p class="card-text">200 руб.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <form>
                    <button class="btn btn-danger w-100">Очистить</button>
                </form>
            </div>
            <div class="col-md-3 mb-4">
                <form>
                    <button class="btn btn-success w-100">Оформить</button>
                </form>
            </div>
        </div>
        <div class="row g-5">
            <div class="col-md-3">
                <div class="card h-100">
                    <picture>
                        <source srcset="{{ asset('img/scan1.avif') }}" type="image/avif">
                        <source srcset="{{ asset('img/scan1.webp') }}" type="image/webp">
                        <source srcset="{{ asset('img/scan1.png') }}" type="image/png">
                        <img src="{{ asset('img/scan1.jpg') }}" class="card-img-top object-fit-contain p-3"
                            {{-- img --}} style="height: 220px;" alt="Сканер 1">
                    </picture>
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Сканер 1</h5> {{-- name --}}
                        <p class="card-text">Очень крутой и качественный сканер для печати денег</p>
                        {{--  description --}}
                        <p class="card-text">Цена: 100 руб.</p> {{-- price --}}
                        <p class="card-text">Кол-во: 1</p>
                        <div class="d-flex flex-row m-auto">
                            <button class="btn btn-secondary me-1">+</button><button
                                class="btn btn-secondary ms-1">-</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card h-100">
                    <picture>
                        <source srcset="{{ asset('img/scan2.avif') }}" type="image/avif">
                        <source srcset="{{ asset('img/scan2.webp') }}" type="image/webp">
                        <source srcset="{{ asset('img/scan2.png') }}" type="image/png">
                        <img src="{{ asset('img/scan2.jpg') }}" class="card-img-top object-fit-contain p-3"
                            style="height: 220px;" alt="Сканер 2">
                    </picture>
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Сканер 2</h5>
                        <p class="card-text">Очень крутой и качественный сканер для печати денег</p>
                        <p class="card-text">Цена: 100 руб.</p>
                        <p class="card-text">Кол-во: 1</p>
                        <div class="d-flex flex-row m-auto">
                            <button class="btn btn-secondary me-1">+</button><button
                                class="btn btn-secondary ms-1">-</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card h-100">
                    <picture>
                        <source srcset="{{ asset('img/scan3.avif') }}" type="image/avif">
                        <source srcset="{{ asset('img/scan3.webp') }}" type="image/webp">
                        <source srcset="{{ asset('img/scan3.png') }}" type="image/png">
                        <img src="{{ asset('img/scan3.jpg') }}" class="card-img-top object-fit-contain p-3"
                            style="height: 220px;" alt="Сканер 3">
                    </picture>
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Сканер 3</h5>
                        <p class="card-text">Очень крутой и качественный сканер для печати денег</p>
                        <p class="card-text">Цена: 100 руб.</p>
                        <p class="card-text">Кол-во: 1</p>
                        <div class="d-flex flex-row m-auto">
                            <button class="btn btn-secondary me-1">+</button><button
                                class="btn btn-secondary ms-1">-</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card h-100">
                    <picture>
                        <source srcset="{{ asset('img/scan4.avif') }}" type="image/avif">
                        <source srcset="{{ asset('img/scan4.webp') }}" type="image/webp">
                        <source srcset="{{ asset('img/scan4.png') }}" type="image/png">
                        <img src="{{ asset('img/scan4.jpg') }}" class="card-img-top object-fit-contain p-3"
                            style="height: 220px;" alt="Сканер 4">
                    </picture>
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Сканер 4</h5>
                        <p class="card-text">Очень крутой и качественный сканер для печати денег</p>
                        <p class="card-text">Цена: 100 руб.</p>
                        <p class="card-text">Кол-во: 1</p>
                        <div class="d-flex flex-row m-auto">
                            <button class="btn btn-secondary me-1">+</button><button
                                class="btn btn-secondary ms-1">-</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
