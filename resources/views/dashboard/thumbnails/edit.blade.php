@extends('components/dashboard/layout')

@section('container')

<x-dashboard.header>
    <x-slot name="title">
        Edit Thumbnail
    </x-slot>
</x-dashboard.header>

<a href="/dashboard/thumbnails" class="btn btn-outline-danger mb-3 text-decoration-none">
    <span data-feather="arrow-left"></span>
    <span class="align-text-top">Back to Thumbnails</span>
</a>
<div class="col-lg-8">
    <form action="/dashboard/thumbnails/{{ $thumbnail->slug }}" method="POST">
        @csrf
        @method('PUT')
        <x-form.input name="name" :old="$thumbnail->name" required />
        <x-form.input name="slug" :old="$thumbnail->slug" required />
        <x-form.input name="url" :old="$thumbnail->url" required />

        <button type="submit" class="btn btn-primary">Edit Thumbnail</button>
    </form>
</div>

<script>
    listenSluggable('/dashboard/posts/checkSlug', 'name', 'slug');
</script>
@endsection
