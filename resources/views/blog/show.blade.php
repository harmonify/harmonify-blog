@extends('components/home/layout')

@section('container')
<div class="container-fluid d-flex justify-content-center">
    <div class="col-9">
        <x-card>
            <article>
                <img src="{{ $post->thumbnail }}" class="card-img-top crop-center" alt="{{ $post->title }}" onclick="window.open(this.src, '_blank').focus()">
                <div class="card-body text-center">
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
        </x-card>

        <a href="/posts" class="btn btn-outline-secondary col-md-3 mb-3">
            <i class="bi bi-arrow-left"></i>
            Back
        </a>

        <section class="mb-5">
            <p class="fs-2 lead">
                Comments
                ({{ $post->comments->count() }})
            </p>

            @include('components.posts.add-comment-form')

            @foreach($post->comments()->latest()->get() as $comment)
                <x-posts.comment-card :comment="$comment" />
            @endforeach
        </section>

    </div>
</div>
@endsection
