@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h1 class="fw-bold mb-4">Add Slider</h1>
    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="{{ route('sliders.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control" rows="3">{{ old('description') }}</textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image <span class="text-danger">*</span></label>
            <input type="file" name="image" id="image" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="order" class="form-label">Order</label>
            <input type="number" name="order" id="order" class="form-control" value="{{ old('order', 0) }}">
        </div>
        <div class="form-check mb-3">
            <input type="checkbox" name="active" id="active" class="form-check-input" {{ old('active', true) ? 'checked' : '' }}>
            <label for="active" class="form-check-label">Active</label>
        </div>
        <button type="submit" class="btn btn-primary">Add Slider</button>
        <a href="{{ route('sliders.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection 