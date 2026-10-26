@extends('layouts.app')

@section('content')
    <div class="d-flex flex-column align-items-center mb-5 text-center">
        <img src="{{ asset('img/icons-scanner-100.png') }}" style="width: 50px">
        <h2>Наш девиз</h2>
        <p>Продавать только качественные продукты</p>
    </div>

    <div id="carouselExampleCaptions" class="carousel slide">
        <div class="carousel-indicators">
            @foreach ($products as $quantity => $item)
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{ $quantity }}"
                    class="{{ $quantity == 0 ? 'active' : '' }}" aria-current="true"
                    aria-label="Slide {{ $quantity + 1 }}"></button>
            @endforeach
        </div>
        <div class="carousel-inner">
            @foreach ($products as $quantity => $item)
                <div class="carousel-item {{ $quantity == 0 ? 'active' : '' }}">
                    <picture>
                        <source srcset="{{ asset('img/' . $item->img . '.avif') }}" type="image/avif">
                        <source srcset="{{ asset('img/' . $item->img . '.webp') }}" type="image/webp">
                        <source srcset="{{ asset('img/' . $item->img . '.png') }}" type="image/png">
                        <img src="{{ asset('img/' . $item->img . '.jpg') }}" class="d-block m-auto object-fit-cover"
                            style="height: 25rem;" alt="{{ $item->name }}">
                    </picture>
                    <div class="carousel-caption d-none d-md-block custom-caption">
                        <h5>{{ $item->name }}</h5>
                    </div>
                </div>
            @endforeach
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
