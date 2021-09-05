@extends('components/home/layout')


@section('container')
    @if (session()->has('alert'))
        <x-alert class="col-lg-5 mx-auto" />
    @endif
    <div class="d-flex flex-column justify-content-center align-items-center min-vh-100">
        <h1 class="text-center mb-5">
            Hello,
            @auth
                {{ auth()->user()->name }}
            @else
                World
            @endauth
            !
        </h1>

    </div>
    <x-card class="mt-5">
        <div class="card-body text-center">
            <h2 class="fs-3 lead">Stay in touch with the latest posts</h2>
            <small class="lead">Promise to keep the inbox clean. No bugs.</small>
            <hr class="mt-4 mb-5">
            <form action="/newsletter" method="POST" class="col-md-6 mx-auto">
                @csrf
                <div class="input-group mb-3 border border-secondary rounded-pill">
                    <span class="input-group-text bg-dark border-0 border-left rounded-pill text-white me-2">
                        <i class="bi bi-envelope"></i>
                    </span>
                    <input name="email" class="col bg-dark border-0 text-white focus-outline-0" placeholder="Your email address" style="resize: none;">
                    <button class="btn btn-secondary text-white rounded-pill px-3 py-2" type="submit">Subscribe</button>
                </div>
                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </form>
        </div>
    </x-card>
@endsection
