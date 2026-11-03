@extends('layouts.admin')

@section('content')
    <div class="container my-5">
        <h1 class="me-4">Админка</h1>
        <h2 class="mb-4">Редактирование товара</h2>

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

        <form method="POST" action="{{ route('admin.products.update', $product->id) }}">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Картинка</span>
                        <input type="text" class="form-control" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-default" name="img" value="{{ $product->img }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Название</span>
                        <input type="text" class="form-control" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-default" name="name" value="{{ $product->name }}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Описание</span>
                        <input type="text" class="form-control" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-default" name="description"
                            value="{{ $product->description }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Краткое описание</span>
                        <input type="text" class="form-control" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-default" name="small_description"
                            value="{{ $product->small_description }}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Модель</span>
                        <input type="text" class="form-control" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-default" name="model" value="{{ $product->model }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Страна</span>
                        <input type="text" class="form-control" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-default" name="country" value="{{ $product->country }}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Произведено</span>
                        <input type="text" class="form-control" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-default" name="release_at"
                            value="{{ $product->release_at }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Цена</span>
                        <input type="text" class="form-control" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-default" name="price" value="{{ $product->price }}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Категория</span>
                        <select class="form-select" aria-label="Default select example" name="category_id">
                            <option value="{{ $product->category->id }}" selected>{{ $product->category->name }}</option>
                            @foreach ($categories as $category)
                                @if ($category->id !== $product->category->id)
                                    <option value="{{ $category->id }}">
                                        {{ $category->name }}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Кол-во</span>
                        <input type="text" class="form-control" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-default" name="quantity"
                            value="{{ $product->quantity }}">
                    </div>
                </div>
            </div>
            <button class="btn btn-success">Подтвердить</button>
        </form>
    </div>
@endsection
