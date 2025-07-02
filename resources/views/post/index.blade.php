@extends('layouts.app')

@section('content')
    <div class="container">
        @if(isset($sliders) && $sliders->count())
            <div id="blogSlider" class="carousel slide mb-5" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach($sliders as $slider)
                        <div class="carousel-item @if($loop->first) active @endif">
                            <img src="{{ asset('storage/' . $slider->image) }}" class="d-block w-100 rounded" alt="{{ $slider->title }}" style="max-height:350px;object-fit:cover;">
                            <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded p-3">
                                @if($slider->title)
                                    <h5 class="fw-bold">{{ $slider->title }}</h5>
                                @endif
                                @if($slider->description)
                                    <p>{{ $slider->description }}</p>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#blogSlider" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#blogSlider" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        @endif
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