@extends('layouts.app')

@section('title', $post->title)

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8 order-2 order-lg-1">
        <div class="card shadow-lg border-0 mb-4">
            @if($post->featured_image)
                <img src="{{ asset('storage/' . $post->featured_image) }}" class="card-img-top rounded-top" alt="{{ $post->title }}">
            @endif
            <div class="card-body">
                <h1 class="card-title fw-bold mb-3">{{ $post->title }}</h1>
                <p class="text-muted mb-2">By {{ $post->user->name ?? 'Unknown' }} &middot; {{ $post->created_at->format('M d, Y') }}</p>
                <div class="card-text mb-4">{!! $post->content !!}</div>
            </div>
        </div>
        <section id="comments">
            <h3 class="fw-bold mb-3">Comments ({{ $post->comments->count() }})</h3>
            @forelse($post->comments as $comment)
                <div class="card mb-3 border-0 shadow-sm">
                    <div class="card-body d-flex align-items-start">
                        <img src="https://ui-avatars.com/api/?name={{ urlencode($comment->name) }}&background=4e73df&color=fff&size=40" class="rounded-circle me-3" width="40" height="40" alt="Avatar">
                        <div>
                            <strong>{{ $comment->name }}</strong>
                            <p class="mb-1">{{ $comment->content }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="alert alert-info">No comments yet. Be the first to comment!</div>
            @endforelse
        </section>
        @auth
        <section id="add-comment" class="mt-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h5 class="fw-bold mb-3">Add a Comment</h5>
                    @if(session('status'))
                        <div class="alert alert-success">{{ session('status') }}</div>
                    @endif
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="POST" action="{{ route('post.comment', $post->slug) }}">
                        @csrf
                        <div class="mb-3">
                            <textarea name="content" class="form-control" rows="3" placeholder="Write your comment..." required>{{ old('content') }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit Comment</button>
                    </form>
                </div>
            </div>
        </section>
        @endauth
    </div>
    <div class="col-lg-4 mb-4 mb-lg-0 order-1 order-lg-2">
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-body text-center">
                <img src="https://ui-avatars.com/api/?name={{ urlencode($post->user->name ?? 'Unknown') }}&background=4e73df&color=fff&size=80" class="rounded-circle mb-3" width="80" height="80" alt="Author Avatar">
                <h5 class="fw-bold mb-1">{{ $post->user->name ?? 'Unknown' }}</h5>
                <p class="text-muted mb-1">{{ $post->user->email ?? '' }}</p>
                @if(!empty($post->user->bio))
                    <p class="mt-2">{{ $post->user->bio }}</p>
                @endif
            </div>
        </div>
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <h5 class="fw-bold mb-3 border-bottom pb-2">Latest Posts</h5>
                @if($latestPosts->count())
                    <ul class="list-unstyled mb-0">
                        @foreach($latestPosts as $latest)
                            <li class="mb-2">
                                <a href="{{ route('post.show', $latest->slug) }}" class="text-decoration-none">{{ $latest->title }}</a>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-muted mb-0">No recent posts.</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
<footer class="bg-white border-top py-3 mt-5">
    <div class="container text-center">
        <small>&copy; {{ date('Y') }} BlogSystem. All rights reserved. | <a href="/">Home</a> | <a href="/contact">Contact</a></small>
    </div>
</footer>
@endsection