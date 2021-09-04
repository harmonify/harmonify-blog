@extends('components/home/layout')

@section('container')
<div class="container-fluid d-flex justify-content-center">
    <div class="col-9">
        <x-card>
            <article>
                <img src="https://source.unsplash.com/collection/4510513/1200x400?{{ isset($i) ? $i : "" }}" class="card-img-top" alt="{{ $post->title }}">
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
                ({{ $comments->count() }})
            </p>
            @auth
                <x-card>
                    <form action="/posts/{{ $post->slug }}/comment" method="POST" class="p-3">
                        @csrf
                        <header class="d-flex align-items-center mb-4">
                            <img src="https://i.pravatar.cc/80?u={{ auth()->id() }}" class="rounded-circle">
                            <h2 class="lead ms-3">Want to discuss about this post?</h2>
                        </header>
                        <div class="mb-4">
                            <textarea name="body" class="bg-dark border-secondary border-start-0 border-end-0 text-white w-100" rows="10" placeholder="Quick, think of something to say!" style="resize: none"></textarea>
                        </div>
                        <div class="">
                            <button class="bg-primary border-0 text-white fw-bold fs-6 py-2 px-3 rounded-2">
                                Submit
                            </button>
                        </div>
                    </form>
                </x-card>
            @else
                <h2 class="lead mb-4">
                    <a href="/register" class="text-white">Register</a> or <a href="/login" class="text-white">log in</a> to leave a comment.
                </h2>
            @endauth
            @foreach($post->comments()->latest()->get() as $comment)
                <x-post-comment :comment="$comment" />
            @endforeach
        </section>

    </div>
</div>
@endsection
