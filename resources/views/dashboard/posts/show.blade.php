@extends('components/dashboard/layout')

@section('container')
<div class="container-fluid d-flex justify-content-center py-4">
    <div class="col-lg-9">
        <div class="card mb-4 rounded-3 border-secondary">
            <img src="{{ $post->thumbnail }}" class="card-img-top crop-center cursor-pointer" alt="{{ $post->title }}" onclick="window.open(this.src, '_blank').focus()">
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
                    <x-dashboard.destroy action="/dashboard/posts/{{ $post->slug }}">
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
