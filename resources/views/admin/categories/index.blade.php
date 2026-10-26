@extends('layouts.admin')

@section('content')
    <div class="container my-5">
        <h1 class="me-4">Админка</h1>

        @error('name')
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
                    @foreach ($categories as $category)
                        <tr>
                            <th scope="row">{{ $category->id }}</th>
                            <td>{{ $category->name }}</td>
                            <td class="d-flex flex-row">
                                <form method="POST" action="{{ route('admin.categories.destroy', $category->id) }}"
                                    onsubmit="return confirm('Вы уверены ?');">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="id" value="{{ $category->id }}">
                                    <button type="submit" class="btn btn-danger">Удалить</button>
                                </form>
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

        <div>
            <button type="button" class="btn btn-primary open-modal-btn" data-bs-toggle="modal"
                data-bs-target="#exampleModal">Добавить</button>
        </div>

        @if ($categories->isNotEmpty())
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Создание категории</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{ route('admin.categories.store') }}" id="accept">
                                @csrf
                                <div class="mb-3">
                                    <label for="message-text" class="col-form-label">Название:</label>
                                    <textarea name="name" class="form-control" id="message-text"></textarea>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                            <button type="submit" class="btn btn-primary" form="accept">Добавить</button>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
