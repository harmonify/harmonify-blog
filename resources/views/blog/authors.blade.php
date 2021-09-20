@extends('components/home/layout')

@section('container')
    <x-heading :heading="$heading" />
    @foreach ($authors as $author)
        <div class="card bg-dark rounded border border-secondary mb-3">
            <div class="card-body">
                <h5 class="card-title mb-2">{{ $author->name }}</h5>
                <p class="card-subtitle mb-3">{{ $author->username }}</p>
                <a href="/posts?author={{ $author->username }}" class="text-reset text-decoration-none btn btn-outline-secondary stretched-link">
                    <span>View Posts</span>
                    <i class="bi bi-arrow-right-circle-fill text-white"></i>
                </a>
            </div>
        </div>
    @endforeach

    <div class="d-flex justify-content-center">
        {{ $authors->links() }}
    </div>
@endsection
