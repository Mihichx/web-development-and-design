@extends('layouts.admin')

@section('content')
    <div class="container my-5">
        <h1 class="me-4">Админка</h1>

        @error('cause')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Название</th>
                </tr>
            </thead>
            <tbody>
                @if ($categories->isNotEmpty())
                    @foreach ($categories as $item)
                        <tr>
                            <th scope="row">{{ $item->id }}</th>
                            <td>{{ $item->name }}</td>
                            <td class="d-flex flex-row">
                                {{-- <form method="POST" action="{{ route('admin.orders.update', $item->id) }}">
                                    @csrf
                                    @method('DEL')

                                    <input type="hidden" name="id" value="{{ $item->id }}">
                                    <input type="hidden" name="delete" value="1"> --}}
                                <button type="submit" class="btn btn-danger me-1">Удалить</button>
                                {{-- </form> --}}
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="5" class="text-center">Нет категорий для отображения</td>
                    </tr>
                @endif
            </tbody>
        </table>

        <div class="d-flex">
            <form method="POST" class="m-auto">
                @csrf
                <input type="hidden" name="create" value="2">
                <button type="submit" class="btn btn-primary">Добавить</button>
            </form>
        </div>

        {{-- @if ($orders->isNotEmpty())
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
                                    <textarea name="cause" class="form-control" id="message-text"></textarea>
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
        @endif --}}
    </div>
@endsection
