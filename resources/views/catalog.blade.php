@extends('layouts.app')

@section('content')
    <!-- Перенесли заголовок внутрь контейнера, чтобы он не улетал влево -->
    <div class="container my-5">
        <h1 class="mb-4">Каталог</h1>
        <div class="row">
            <div class="col-md-6">
                <select class="form-select mb-4" aria-label="Default select example">
                    <option selected>Сортировать</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div>
            <div class="col-md-6">
                <select class="form-select mb-4" aria-label="Default select example">
                    <option selected>Категории</option>
                    <option value="1">Лазерные</option>
                    <option value="2">Принтеры</option>
                    <option value="3">Струйные принтеры</option>
                    <option value="4">Термопринтеры</option>
                </select>
            </div>
        </div>
        <div class="row g-5">
            <div class="col-md-3">
                <a href="#" class="hover text-dark">
                    <div class="card h-100">
                        <picture>
                            <source srcset="{{ asset('img/scan1.avif') }}" type="image/avif">
                            <source srcset="{{ asset('img/scan1.webp') }}" type="image/webp">
                            <source srcset="{{ asset('img/scan1.png') }}" type="image/png">
                            <img src="{{ asset('img/scan1.jpg') }}" class="card-img-top object-fit-contain p-3"
                                style="height: 220px;" alt="Сканер 1">
                        </picture>
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">Сканер 1</h5>
                            <p class="card-text">Очень крутой и качественный сканер для печати денег</p>
                            <p class="card-text">Цена: 100 руб.</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="#" class="hover text-dark">
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
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="#" class="hover text-dark">
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
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="#" class="hover text-dark">
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
                        </div>
                    </div>
                </a>
            </div>

        </div>
    </div>
@endsection
