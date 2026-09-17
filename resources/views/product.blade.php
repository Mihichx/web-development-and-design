@extends('layouts.app')

@section('content')
    <h1 class="m-5">Продукт</h1>
    
    <div class="d-flex" style="justify-content: center">
        <div class="card" style="width: 400px;">
            <picture>
                <source srcset="{{ asset('img/scan1.avif') }}" type="image/avif">
                <source srcset="{{ asset('img/scan1.webp') }}" type="image/webp">
                <source srcset="{{ asset('img/scan1.png') }}" type="image/png">
                <img src="{{ asset('img/scan1.jpg') }}" class="card-img-top object-fit-cover" alt="Сканер 1">
            </picture>
            <div class="card-body d-flex flex-column">
                <h5 class="card-title">Сканер 4</h5> {{-- name --}}
                <p class="card-text">Очень крутой и качественный сканер для печати денег</p> {{-- description --}}
                <p class="card-text">Год выпуска: 2026-09-16</p> {{-- year_release --}}
                <p class="card-text">Модель: MSP</p> {{-- model --}}
                <p class="card-text">Цена: 100 руб.</p> {{-- price --}}
                <a href="#" class="btn btn-success mt-auto">Добавить</a>
            </div>
        </div>
    </div>
@endsection
