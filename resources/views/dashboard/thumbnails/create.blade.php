@extends('components/dashboard/layout')

@section('container')

<x-dashboard.header>
    <x-slot name="title">
        Add New Thumbnail
    </x-slot>
</x-dashboard.header>

<a href="/dashboard/thumbnails" class="btn btn-outline-danger mb-3 text-decoration-none">
    <span data-feather="arrow-left"></span>
    <span class="align-text-top">Back to Thumbnails</span>
</a>
<div class="col-lg-8">
    <form action="/dashboard/thumbnails" method="POST">
        @csrf
        <x-form.input name="name" required />
        <x-form.input name="slug" required />
        <x-form.input name="url" required />

        <button type="submit" class="btn btn-primary">Add Thumbnail</button>
    </form>
</div>

<script>
    listenSluggable('/dashboard/posts/checkSlug', 'name', 'slug');
</script>
@endsection
