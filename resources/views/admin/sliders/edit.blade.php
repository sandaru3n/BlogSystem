@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h1 class="fw-bold mb-4">Edit Slider</h1>
    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="{{ route('sliders.update', $slider) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $slider->title) }}">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control" rows="3">{{ old('description', $slider->description) }}</textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" name="image" id="image" class="form-control">
            @if($slider->image)
                <img src="{{ asset('storage/' . $slider->image) }}" alt="Current Image" class="img-fluid mt-2 rounded" style="max-height: 100px;">
            @endif
        </div>
        <div class="mb-3">
            <label for="order" class="form-label">Order</label>
            <input type="number" name="order" id="order" class="form-control" value="{{ old('order', $slider->order) }}">
        </div>
        <div class="form-check mb-3">
            <input type="checkbox" name="active" id="active" class="form-check-input" {{ old('active', $slider->active) ? 'checked' : '' }}>
            <label for="active" class="form-check-label">Active</label>
        </div>
        <button type="submit" class="btn btn-primary">Update Slider</button>
        <a href="{{ route('sliders.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection 