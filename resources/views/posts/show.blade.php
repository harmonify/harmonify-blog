@extends('components/home/layout')

@section('container')
<div class="container-fluid d-flex justify-content-center">
    <div class="col-9">
        <article class="card bg-dark mb-4 rounded-3 border-secondary text-center">
            <img src="https://source.unsplash.com/collection/4510513/1200x400?{{ isset($i) ? $i : "" }}" class="card-img-top" alt="{{ $post->title }}">
            <div class="card-body">
                <h1 class="card-title fs-3">{{ $post->title }}</h1>
                <small class="d-block mb-2 card-subtitle text-muted fst-italic">
                    <span>by</span>
                    <a href="/posts?author={{ $post->author->username }}" class="text-reset text-decoration-none">{{ $post->author->name }}</a>
                    <span>{{ $post->created_at->diffForHumans() }}</span>
                </small>
                <div class="mb-3">
                    <a href="/posts?category={{ $post->category->slug }}" class="badge text-reset text-decoration-none bg-secondary">{{ $post->category->name }}</a>
                </div>
                <div class="card-text text-start">
                    {!! $post->body !!}
                </div>
            </div>
            
        </article>

        <a href="#" class="btn btn-outline-secondary col-md-3 mb-3" onclick="goBack()">
            <i class="bi bi-arrow-left"></i>
            Back
        </a>

        <section class="mb-5">
            <p class="fs-2 lead">Comments</p>
            @foreach($post->comments as $comment)
                <x-post-comment :comment="$comment" />
            @endforeach
        </section>

    </div>
</div>
@endsection
