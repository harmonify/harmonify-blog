@extends('components/dashboard/layout')

@section('container')

<x-dashboard.header>
    <x-slot name="title">
        My Posts
    </x-slot>
    <x-dashboard.toolbar />
</x-dashboard.header>

@if (session()->has('alert'))
<x-alert class="col-xl-10" />
@endif
<div class="table-responsive col-xl-10">
    <a href="/dashboard/posts/create" class="btn btn-primary mb-3 text-white text-decoration-none">
        <span data-feather="plus"></span>
        <span class="align-text-top">Create New Post</span>
    </a>
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Category</th>
                <th scope="col">Last Updated At</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($posts as $post)
        <tr>
            <th scope="row">{{ $loop->index + $posts->firstItem() }}</th>
            <td>{{ $post->title }}</td>
            <td>{{ $post->category->name }}</td>
            <td>{{ $post->updated_at->diffForHumans() }}</td>
            <td>
                <a href="/dashboard/posts/{{ $post->slug }}" class="btn btn-sm btn-info text-decoration-none text-light">
                    <span data-feather="eye"></span>
                </a>
                <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-sm btn-warning text-decoration-none text-light">
                    <span data-feather="edit"></span>
                </a>
                <x-dashboard.destroy action="/dashboard/posts/{{ $post->slug }}"/>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $posts->links() }}
    </div>
</div>
@endsection
