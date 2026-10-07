@extends('layouts.admin')

@section('content')
    <div class="container my-5">
        <h1 class="me-4">Админка</h1>

        <div class="row d-flex justify-content-center">
            <div class="col-md-4 mb-4">
                <form method="GET">
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Сортировать</option>
                        <option value="1">Новые</option>
                        <option value="2">Подтвержденные</option>
                        <option value="3">Отмененные</option>
                    </select>
                </form>
            </div>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">ФИО</th>
                    <th scope="col">Кол-во товаров</th>
                    <th scope="col">Дата заказа</th>
                    <th scope="col">Действие</th>
                </tr>
            </thead>
            <tbody>
                @if ($orders->isNotEmpty())
                    @foreach ($orders as $item)
                        <tr>
                            <th scope="row">{{ $item->id }}</th>
                            <td>{{ $item->user->surname }} {{ $item->user->name }} {{ $item->user->patronymic }}</td>
                            @php
                                $products = json_decode($item->value, true);
                                $count = is_array($products) ? count($products) : 0;
                            @endphp
                            <td>{{ $count }}</td>
                            <td>{{ $item->order_date }}</td>
                            <td class="d-flex flex-row">
                                @if ($item->order_status_id === 1)
                                    <form method="POST" action="{{ route('admin.orders.update', $item->id) }}">
                                        @csrf
                                        @method('PUT')

                                        <input type="hidden" name="id" value="{{ $item->id }}">
                                        <input type="hidden" name="status" value="2">
                                        <button class="btn btn-success me-1">Подтвердить</button>
                                    </form>
                                    <button type="button" class="btn btn-danger open-modal-btn" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal" data-id="{{ $item->id }}">Отменить</button>
                                @else
                                    <p class="m-0 {{ $item->order_status_id === 2 ? 'text-success' : 'text-danger' }}">{{ $item->status->name }}</p>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="5" class="text-center">Нет заказов для отображения</td>
                    </tr>
                @endif
            </tbody>
        </table>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Причина отмены</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('admin.orders.update', $item->id) }}" id="accept">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <input type="hidden" name="id" id="modal-product-id" value="0">
                                <input type="hidden" name="status" value="3">
                                <label for="message-text" class="col-form-label">Сообщение:</label>
                                <textarea name="cause" class="form-control" id="message-text" required></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                        <button type="submit" class="btn btn-primary" form="accept">Отправить</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
