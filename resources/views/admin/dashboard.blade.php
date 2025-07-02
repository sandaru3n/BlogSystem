@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1 class="mb-4 fw-bold">Admin Dashboard</h1>
    <div class="row g-4 mb-4">
        <div class="col-md-6">
            <div class="card shadow-sm border-0 text-center">
                <div class="card-body">
                    <h5 class="card-title">Total Posts</h5>
                    <p class="display-4 fw-bold text-primary mb-0">{{ $posts }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow-sm border-0 text-center">
                <div class="card-body">
                    <h5 class="card-title">Total Comments</h5>
                    <p class="display-4 fw-bold text-success mb-0">{{ $comments }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-md-4 mb-2">
            <a href="{{ route('admin.manage-posts') }}" class="btn btn-lg btn-outline-primary w-100">
                <i class="bi bi-file-earmark-text"></i> Manage Posts
            </a>
        </div>
        <div class="col-md-4 mb-2">
            <a href="{{ route('admin.categories.index') }}" class="btn btn-lg btn-outline-secondary w-100">
                <i class="bi bi-tags"></i> Manage Categories
            </a>
        </div>
        <div class="col-md-4 mb-2">
            <a href="{{ route('sliders.index') }}" class="btn btn-lg btn-outline-info w-100">
                <i class="bi bi-images"></i> Manage Sliders
            </a>
        </div>
    </div>
</div>
@endsection

@section('nofooter')
@endsection 