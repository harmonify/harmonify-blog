@extends('components/home/layout')

@section('container')
    <x-heading :heading="$heading" />
    <div class="row">
        @foreach ($categories as $category)
            <div class="col-md-4">
                <div class="card bg-dark mb-4 rounded-3 border-secondary">
                    <a href="/posts?category={{ $category->slug }}" class="text-decoration-none text-white">
                        <img src="https://source.unsplash.com/collection/4510513/500x500?{{ $loop->iteration }}" alt="{{ $category->name }}" class="img-fluid">
                        <div class="card-img-overlay d-flex align-items-center" style="background-color: rgba(0,0,0,.4)">
                            <span class="card-title fs-3 fw-bold">{{ $category->name }}</span>
                        </div>
                    </a>
                </div>
            </div>
        @endforeach
    </div>

    <div class="d-flex justify-content-center">
        {{ $categories->links() }}
    </div>
@endsection
