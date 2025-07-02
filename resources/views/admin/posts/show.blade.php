@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h1 class="fw-bold mb-4">Post Details</h1>
    <div class="card shadow-sm border-0">
        <div class="card-body">
            <h5 class="card-title">ID: {{ $post->id }}</h5>
            <p class="card-text">Title: {{ $post->title }}</p>
            <p class="card-text">Slug: {{ $post->slug }}</p>
            <p class="card-text">Category: {{ $post->category->name ?? '-' }}</p>
            <p class="card-text">Content:</p>
            <div class="mb-3">{!! $post->content !!}</div>
            @if($post->featured_image)
                <img src="{{ asset('storage/' . $post->featured_image) }}" class="img-fluid mb-3" style="max-height: 200px;">
            @endif
            <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary">Back to List</a>
        </div>
    </div>
</div>
@endsection 