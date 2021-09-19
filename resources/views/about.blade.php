@extends('components/home/layout')

@section('container')
<div class="m-auto text-center min-vh-100">
    <h1 class="mb-3">About Me</h1>
    <img class="mb-3 img-thumbnail rounded-circle bg-secondary border-0" src="img/{{ $image }}" width="200" alt="">
    <ul class="list-unstyled mb-3">
        <li>Name : {{ $name }}</li>
        <li>Age : {{ $age }}</li>
        <li>Gender : {{ $gender }}</li>
    </ul>
</div>
@endsection
