@extends('components/dashboard/layout')

@section('container')

<x-dashboard.header>
    <x-slot name="title">
        Create New Category
    </x-slot>
</x-dashboard.header>

<a href="/dashboard/categories" class="btn btn-outline-danger mb-3 text-decoration-none">
    <span data-feather="arrow-left"></span>
    <span class="align-text-top">Back to Categories</span>
</a>
<div class="col-lg-8">
    <form action="/dashboard/categories" method="POST">
        @csrf
        <x-form.input name="name" required />
        <x-form.input name="slug" required />

        <button type="submit" class="btn btn-primary">Create Category</button>
    </form>
</div>

<script>
    listenSluggable('/dashboard/posts/checkSlug', 'name', 'slug');
</script>
@endsection
