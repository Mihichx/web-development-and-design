@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <h1 class="mb-4">Корзина</h1>

        <div class="row">
            <div class="col-md-12 mb-4">
                <div class="card d-flex justify-content-center align-items-center" style="height: 300px;">
                    <h2>Пусто</h2> {{-- Либо не авторизован --}}
                </div>
            </div>
        </div>
    </div>
@endsection
