@extends('components/dashboard/layout')

@section('container')
<div class="container-fluid d-flex justify-content-center py-4">
    <div class="col-lg-9">
        <div class="card mb-4 rounded-3 border-secondary">
            <img src="{{ $thumbnail->url }}" class="card-img-top crop-center cursor-pointer" alt="{{ $thumbnail->name }}" onclick="window.open(this.src, '_blank').focus()">
            <div class="card-body">
                <div class="mb-4">
                    <a href="/dashboard/thumbnails" class="btn btn-sm btn-success text-decoration-none text-light">
                        <span data-feather="arrow-left"></span>
                        Back to My Thumbnails
                    </a>
                    <a href="/dashboard/thumbnails/{{ $thumbnail->slug }}/edit" class="btn btn-sm btn-warning text-decoration-none text-light">
                        <span data-feather="edit"></span>
                        Edit
                    </a>
                    <x-dashboard.destroy action="/dashboard/thumbnails/{{ $thumbnail->slug }}">
                        Delete
                    </x-dashboard.destroy>
                </div>
                <h5 class="card-title">{{ $thumbnail->name }}</h5>
                <p class="card-text">URL: {{ $thumbnail->url }}</p>
                <p class="card-text">Added {{ $thumbnail->created_at->diffForHumans() }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
