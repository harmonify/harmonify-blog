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
    <x-card class="mt-5 col-md-8 mx-auto">
        <div class="card-body text-center">
            <h2 class="fs-3 lead">Stay in touch with the latest posts</h2>
            <small class="lead">Promise to keep the inbox clean. No bugs.</small>
            <hr class="mt-4 mb-5">
            <form action="/newsletter" method="POST" class="col-md-6 mx-auto">
                @csrf
                <div class="row input-group mb-3 mx-auto border border-secondary rounded-pill">
                    <span class="col-1 input-group-text border-0 border-left rounded-pill text-white me-2" style="background: #0000;">
                        <i class="bi bi-envelope"></i>
                    </span>
                    <input name="email" class="col border-0 text-white focus-outline-0" style="background: #0000;" placeholder="Your email address">
                    <button class="col flex-grow-0 btn btn-secondary text-white rounded-pill px-md-3 py-md-2" type="submit">Subscribe</button>
                </div>
                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </form>
        </div>
    </x-card>
@endsection
