@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h1 class="fw-bold mb-4">Category Details</h1>
    <div class="card shadow-sm border-0">
        <div class="card-body">
            <h5 class="card-title">ID: {{ $category->id }}</h5>
            <p class="card-text">Name: {{ $category->name }}</p>
            <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Back to List</a>
        </div>
    </div>
</div>
@endsection 