@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4 fw-bold">Blog Posts</h1>
        @if($posts->count())
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                @foreach($posts as $post)
                    <div class="col">
                        <div class="card h-100 shadow-sm border-0">
                            @if($post->featured_image)
                                <img src="{{ asset('storage/' . $post->featured_image) }}" class="card-img-top" alt="{{ $post->title }}">
                            @endif
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title fw-bold">{{ $post->title }}</h5>
                                <p class="card-text text-muted small mb-2">By {{ $post->user->name ?? 'Unknown' }} &middot; {{ $post->created_at->format('M d, Y') }}</p>
                                <p class="card-text flex-grow-1">{{ $post->excerpt }}</p>
                                <a href="{{ url('/post/' . $post->slug) }}" class="btn btn-outline-primary mt-auto">Read More</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mt-4">
                {{ $posts->links() }}
            </div>
        @else
            <div class="alert alert-info">No posts found. Check back soon!</div>
        @endif
    </div>
@endsection

@section('footer')
<footer class="bg-white border-top py-3 mt-5">
    <div class="container text-center">
        <small>&copy; {{ date('Y') }} BlogSystem. All rights reserved. | <a href="/">Home</a> | <a href="/contact">Contact</a></small>
    </div>
</footer>
@endsection 