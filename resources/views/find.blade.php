@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <h1 class="mb-4">Где мы</h1>

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
