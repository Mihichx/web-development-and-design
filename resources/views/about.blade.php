@extends('layouts.app')

@section('content')
    <div class="d-flex flex-column align-items-center mb-4 text-center">
        <img src="{{ asset('img/icons-scanner-100.png') }}" style="width: 50px">
        <h2>Наш девиз</h2>
        <p>Продавать только качественные продукты</p>
    </div>
    <div id="carouselExampleCaptions" class="carousel slide">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                aria-label="Slide 2""></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                aria-label="Slide 3""></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3"
                aria-label="Slide 4"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <picture>
                    <source srcset="{{ asset('img/scan1.avif') }}" type="image/avif">
                    <source srcset="{{ asset('img/scan1.webp') }}" type="image/webp">
                    <source srcset="{{ asset('img/scan1.png') }}" type="image/png">
                    <img src="{{ asset('img/scan1.jpg') }}" class="d-block m-auto object-fit-cover" style="height: 25rem;"
                        alt="Сканер 1">
                </picture>
                <div class="carousel-caption d-none d-md-block custom-caption">
                    <h5>Сканер 1</h5>
                </div>
            </div>
            <div class="carousel-item">
                <picture>
                    <source srcset="{{ asset('img/scan2.avif') }}" type="image/avif">
                    <source srcset="{{ asset('img/scan2.webp') }}" type="image/webp">
                    <source srcset="{{ asset('img/scan2.png') }}" type="image/png">
                    <img src="{{ asset('img/scan2.jpg') }}" class="d-block m-auto object-fit-cover" style="height: 25rem;"
                        alt="Сканер 2">
                </picture>
                <div class="carousel-caption d-none d-md-block custom-caption">
                    <h5>Сканер 2</h5>
                </div>
            </div>
            <div class="carousel-item">
                <picture>
                    <source srcset="{{ asset('img/scan3.avif') }}" type="image/avif">
                    <source srcset="{{ asset('img/scan3.webp') }}" type="image/webp">
                    <source srcset="{{ asset('img/scan3.png') }}" type="image/png">
                    <img src="{{ asset('img/scan3.jpg') }}" class="d-block m-auto object-fit-cover" style="height: 25rem;"
                        alt="Сканер 3">
                </picture>
                <div class="carousel-caption d-none d-md-block custom-caption">
                    <h5>Сканер 3</h5>
                </div>
            </div>
            <div class="carousel-item">
                <picture>
                    <source srcset="{{ asset('img/scan4.avif') }}" type="image/avif">
                    <source srcset="{{ asset('img/scan4.webp') }}" type="image/webp">
                    <source srcset="{{ asset('img/scan4.png') }}" type="image/png">
                    <img src="{{ asset('img/scan4.jpg') }}" class="d-block m-auto object-fit-cover" style="height: 25rem;"
                        alt="Сканер 4">
                </picture>
                <div class="carousel-caption d-none d-md-block custom-caption">
                    <h5>Сканер 4</h5>
                </div>
            </div>

        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true" style="filter: invert(1);"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true" style="filter: invert(1);"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
@endsection
