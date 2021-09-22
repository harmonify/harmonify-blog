@extends('components/home/layout')

@section('container')
    <x-heading :heading="$heading" />
    <div class="row mb-5 justify-content-center">
        <div class="col-6">
            <form action="/posts">
                @if (request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
                @if (request('author'))
                    <input type="hidden" name="author" value="{{ request('author') }}">
                @endif
                <div class="input-group">
                    <input type="search" name="search" class="form-control" id="floatingInput" placeholder="Search by keyword..." autocomplete="off" value="{{ request('search') }}">
                    <button class="btn btn-outline-secondary" type="submit">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>

    @if ($posts->count())
    {{-- Hero --}}
    <div class="card bg-dark mb-4 rounded-3 border-secondary text-center">
        <img src="{{ $posts[0]->thumbnail }}" class="card-img-top img-fluid crop-center" alt="{{ $posts[0]->title }}">
        <div class="card-body">
            <h5 class="card-title">{{ $posts[0]->title }}</h5>
            <small class="d-block mb-2 card-subtitle text-muted fst-italic">
                <span>by</span>
                <a href="/posts?author={{ $posts[0]->author->username }}" class="text-reset text-decoration-none">{{ $posts[0]->author->name }}</a>
                <span>{{ $posts[0]->created_at->diffForHumans() }}</span>
            </small>
            <div class="mb-3">
                <a href="/posts?category={{ $posts[0]->category->slug }}" class="badge text-reset text-decoration-none bg-secondary">{{ $posts[0]->category->name }}</a>
            </div>
            <p class="card-text text-truncate">{!! $posts[0]->excerpt !!}</p>
            <a href="/posts/{{ $posts[0]->slug }}" class="btn btn-outline-secondary">View Post</a>
        </div>
    </div>
    {{-- /Hero --}}

    {{-- Posts --}}
    <div class="row mb-3" data-masonry='{"percentPosition": true }'>
        @foreach ($posts->skip(1) as $post)
            <article class="col-12 col-md-6 col-lg-4">
                <div class="card bg-dark mb-4 rounded-3 border-secondary text-center text-md-start">
                    <img src="{{ $post->thumbnail }}" alt="{{ $post->title }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <small class="d-block mb-2 card-subtitle text-muted fst-italic">
                            <span>by</span>
                            <a href="/posts?author={{ $post->author->username }}" class="text-reset text-decoration-none">{{ $post->author->name }}</a>
                            <time>{{ $post->created_at->diffForHumans() }}</time>
                        </small>
                        <div class="mb-3">
                            <a href="/posts?category={{ $post->category->slug }}" class="badge text-reset text-decoration-none bg-secondary">{{ $post->category->name }}</a>
                        </div>
                        <p class="card-text text-truncate">{!! $post->excerpt !!}</p>
                        <a href="/posts/{{ $post->slug }}" class="btn btn-outline-secondary">View Post</a>
                    </div>
                </div>
            </article>
        @endforeach
    </div>
    {{-- /Posts --}}

    {{-- Pagination --}}
    <div class="d-flex justify-content-center">
        {{ $posts->links() }}
    </div>
    {{-- /Pagination --}}

    @else
        <h2 class="text-center">No Posts Found</h2>
    @endif

@endsection
