
@extends('layouts.master')

@section('title')
    Cập nhật danh mục: {{ $category['name'] }}
@endsection

@section('content')
    <h1>Cập nhật danh mục: {{ $category['name'] }}</h1>

    @if (!empty($_SESSION['errors']))
    <div class="alert alert-warning">
        <ul>
            @foreach ($_SESSION['errors'] as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>

        @php
        unset($_SESSION['errors']);
        @endphp
    </div>
    @endif

    <form action="{{ url("admin/categories/{$category['id']}/update") }}" enctype="multipart/form-data" method="POST">
        <div class="mb-3 mt-3">
            <label for="name" class="form-label">Name:</label>
            <input type="text" class="form-control" id="name" placeholder="Enter name" value="{{ $category['name'] }}" name="name">
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </form>
@endsection