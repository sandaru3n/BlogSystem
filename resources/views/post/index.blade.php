@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Blog Posts</h1>
        @if($posts->count())
            <ul>
                @foreach($posts as $post)
                    <li>
                        <a href="{{ url('/post/' . $post->slug) }}">{{ $post->title }}</a>
                        <p>{{ $post->excerpt }}</p>
                    </li>
                @endforeach
            </ul>
            {{ $posts->links() }}
        @else
            <p>No posts found.</p>
        @endif
    </div>
@endsection 