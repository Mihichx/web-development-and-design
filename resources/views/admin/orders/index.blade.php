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
                <tr>
                    <th scope="row">1{{-- id --}}</th>
                    <td>Михайлов Михаил{{-- surname, name, patronymic (по user_id) --}}</td>
                    <td>23{{-- кол-во товаров (по value - json) --}}</td>
                    <td>2026-09-16{{-- order_date --}}</td>
                    <td class="d-flex flex-row">
                        <form method="POST">
                            @csrf
                            <input type="hidden" name="status" value="1">
                            <button class="btn btn-success me-1">Подтвердить</button>
                        </form>
                        <form method="POST">
                            @csrf
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#exampleModal" data-bs-whatever="@mdo">Отменить</button>
                        </form>
                    </td>
                </tr>
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
                        <form method="POST" id="accept">
                            <div class="mb-3">
                                <label for="message-text" class="col-form-label">Сообщение:</label>
                                <textarea name="status" class="form-control" id="message-text"></textarea>
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
