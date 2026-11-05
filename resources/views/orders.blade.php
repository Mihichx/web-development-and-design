@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <h1 class="mb-4">Заказы</h1>

        @if ($orders->isNotEmpty())
            @foreach ($orders as $order)
                <div class="card mb-3 p-3">
                    <h3>Заказ №{{ $order->id }}</h3>
                    <p>Статус: {{ $order->order_status_id }}</p>

                    <h5>Товары в заказе:</h5>
                    <ul>
                        @foreach ($order->products as $product)
                            <li>
                                Товар ID: {{ $product->product_id }} — Количество: {{ $product->quantity }} — Цена:
                                {{ $product->price_at_purchase }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        @else
        <div class="d-flex align-items-center justify-content-center">
            <h2>Пусто</h2>
        </div>
        @endif
    </div>
@endsection
