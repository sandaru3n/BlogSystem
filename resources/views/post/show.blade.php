@extends('layouts.app')

@section('title', $post->title)

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
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
    </div>
</div>
@endsection