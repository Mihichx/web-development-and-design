@extends('layouts.app')

@section('content')
    <h1 class="m-5">Продукт</h1>
    <div class="d-flex" style="justify-content: center">
        <div class="card" style="width: 400px;">
            <picture>
                <source srcset="{{ asset('img/scan1.avif') }}" type="image/avif">
                <source srcset="{{ asset('img/scan1.webp') }}" type="image/webp">
                <source srcset="{{ asset('img/scan1.png') }}" type="image/png">
                <img src="{{ asset('img/scan1.jpg') }}" class="card-img-top object-fit-cover"
                    alt="Сканер 1">
            </picture>
            <div class="card-body d-flex flex-column">
                <h5 class="card-title">Сканер 4</h5>
                <p class="card-text">Очень крутой и качественный сканер для печати денег</p>
                <a href="#" class="btn btn-success mt-auto">Купить</a>
            </div>
        </div>
    </div>
@endsection
