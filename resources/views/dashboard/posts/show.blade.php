@extends('components/dashboard/layout')

@section('container')
<div class="container-fluid d-flex justify-content-center py-4">
    <div class="col-lg-9">
        <div class="card mb-4 rounded-3 border-secondary">
            <img src="https://source.unsplash.com/collection/4510513/1200x400" class="card-img-top" alt="{{ $post->title }}">
            <div class="card-body">
                <div class="mb-4">
                    <a href="/dashboard/posts" class="btn btn-sm btn-success text-decoration-none text-light">
                        <span data-feather="arrow-left"></span>
                        Back to My Posts
                    </a>
                    <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-sm btn-warning text-decoration-none text-light">
                        <span data-feather="edit"></span>
                        Edit
                    </a>
                    <x-dashboard.destroy :slug="$post->slug">
                        Delete
                    </x-dashboard.destroy>
                </div>
                <h5 class="card-title">{{ $post->title }}</h5>
                <div class="mb-3">
                    <div class="badge text-white text-decoration-none bg-secondary">{{ $post->category->name }}</div>
                </div>
                <div class="card-text text-start">
                    {!! $post->body !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
