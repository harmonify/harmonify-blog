@extends('components/dashboard/layout')

@section('container')

<x-dashboard.header>
    <x-slot name="title">
        Create New Post
    </x-slot>
</x-dashboard.header>

<a href="/dashboard/posts" class="btn btn-outline-danger mb-3 text-decoration-none">
    <span data-feather="arrow-left"></span>
    <span class="align-text-top">Back to Posts</span>
</a>
<div class="col-lg-8">
    <form action="/dashboard/posts" method="POST" enctype="multipart/form-data">
        @csrf
        <x-form.input name="title" required />
        <x-form.input name="slug" required />
        <x-form.categories name="category_id" label="category" :categories="$categories" required />
        <x-form.search name="thumbnail" label="Thumbnail URL" :dataset="$thumbnails" required />
        <x-form.text-editor name="body" required />

        <button type="submit" class="btn btn-primary">Create Post</button>
    </form>
</div>

<script>
    listenSluggable('/dashboard/posts/checkSlug', 'title', 'slug');
    disableTrixFileUpload();
</script>
@endsection
