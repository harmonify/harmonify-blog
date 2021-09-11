@extends('components/dashboard/layout')

@section('container')

<x-dashboard.header>
    <x-slot name="title">
        Edit Post
    </x-slot>
</x-dashboard.header>

<a href="/dashboard/posts" class="btn btn-outline-danger mb-3 text-decoration-none">
    <span data-feather="arrow-left"></span>
    <span class="align-text-top">Back to Posts</span>
</a>
<div class="col-lg-8">
    <form action="/dashboard/posts/{{ $post->slug }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <x-form.input name="title" :old="$post->title" required />
        <x-form.input name="slug" :old="$post->slug" required />
        <x-form.categories name="category_id" label="category" :categories="$categories" :old="$post->category_id" required />
        <x-form.input name="thumbnail" type="file" />
        <x-form.text-editor name="body" :old="$post->body" required />

        <button type="submit" class="btn btn-primary">Update Post</button>
    </form>
</div>

<script>
    const title = document.querySelector('#title');
    const slug = document.querySelector('#slug');

    title.addEventListener('change', function () {
        fetch(`/dashboard/posts/checkSlug?title=${title.value}`)
            .then(response => response.json())
            .then(data => slug.value = data.slug);
    });
    document.addEventListener('trix-file-accept', function (e) {
        e.preventDefault();
    })
</script>
@endsection
