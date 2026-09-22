@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <h1 class="mb-4">Где мы</h1>

        <div class="row">
            <div class="col-md-12 mb-4">
                <script type="text/javascript" charset="utf-8" async
                    src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A13e8ba184fee97199dc0444142b77bfedf82e5e6612be16e6750b9f22e893d53&amp;width=100%25&amp;height=600&amp;lang=ru_RU&amp;scroll=true">
                </script>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="card h-100">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Адрес</h5> {{-- name --}}
                        <p class="card-text">г. Ижевск, ул. Пушкина, д. 52</p> {{-- value --}}
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Номер телефона</h5>
                        <p class="card-text">+77777777777</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Email</h5>
                        <p class="card-text">copystar@gmail.com</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
