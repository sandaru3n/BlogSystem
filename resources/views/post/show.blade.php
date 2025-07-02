@extends('layouts.app')

@section('title', $post->title)

@section('content')
<article>
    <img src="{{ asset('storage/' . $post->featured_image) }}" class="img-fluid">
    <h1>{{ $post->title }}</h1>
    <div>{!! $post->content !!}</div>
</article>

<section id="comments">
    <h3>Comments ({{ $post->comments->count() }})</h3>
    @foreach($post->comments as $comment)
        <div class="card mb-2">
            <div class="card-body">
                <strong>{{ $comment->name }}</strong>
                <p>{{ $comment->content }}</p>
            </div>
        </div>
    @endforeach
</section>
@endsection