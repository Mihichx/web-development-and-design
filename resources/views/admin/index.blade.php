@extends('layouts.admin')

@section('content')
    <div class="d-flex align-items-center justify-content-center mt-5">
        <h1>Привет {{ Auth::user()->login }}!</h1>
    </div>
@endsection
