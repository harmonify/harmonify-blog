@extends('components/home/layout')

@section('container')
    <div class="d-flex justify-content-center align-items-center min-vh-100">
        <h1 class="text-center">
            Hello,
            @auth
            {{ auth()->user()->name }}!
            @else
            World!
            @endauth
        </h1>
    </div>
@endsection
