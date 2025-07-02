@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-lg border-0">
            <div class="card-body text-center py-5">
                <img src="https://img.icons8.com/ios-filled/50/4e73df/blog.png" alt="Blog Icon" class="mb-3">
                <h2 class="fw-bold mb-3">Welcome to BlogSystem</h2>
                <p class="lead mb-4">Your professional platform to share stories, ideas, and connect with readers.</p>
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <span class="badge bg-primary">You are logged in!</span>
            </div>
        </div>
    </div>
</div>
@endsection
