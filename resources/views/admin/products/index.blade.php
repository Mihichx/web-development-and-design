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
                    <th scope="col">Описание</th>
                    <th scope="col">Модель</th>
                    <th scope="col">Страна</th>
                    <th scope="col">Произведено</th>
                    <th scope="col">Цена</th>
                    <th scope="col">Категория</th>
                    <th scope="col">Кол-во</th>
                </tr>
            </thead>
            <tbody>
                @if ($products->isNotEmpty())
                    @foreach ($products as $product)
                        <tr>
                            <th scope="row">{{ $product->id }}</th>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->small_description }}</td>
                            <td>{{ $product->model }}</td>
                            <td>{{ $product->country }}</td>
                            <td>{{ $product->release_at }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->category->name }}</td>
                            <td>{{ $product->quantity }}</td>
                            <td class="d-flex flex-row">
                                <a class="btn btn-success" href="{{ route('admin.products.edit', $product->id) }}">Редактировать</a>
                            </td>
                            <td class="d-flex flex-row">
                                <form method="POST" action="{{ route('admin.products.destroy', $product->id) }}"
                                    onsubmit="return confirm('Вы уверены ?');">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="id" value="{{ $product->id }}">
                                    <button type="submit" class="btn btn-danger">Удалить</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="5" class="text-center">Нет продуктов для отображения</td>
                    </tr>
                @endif
            </tbody>
        </table>

        <div>
            <a class="btn btn-primary" href="{{ route('admin.products.create') }}">Добавить</a>
        </div>
    </div>
@endsection
