@extends('components/dashboard/layout')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">My Posts</h1>
    <div class="btn-toolbar mb-2 mb-md-0 opacity-50">
        <div class="btn-group me-2">
            <button type="button" class="btn btn-sm btn-outline-secondary disabled">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary disabled">Export</button>
        </div>
        <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle disabled">
            <span data-feather="calendar"></span>
            This week
        </button>
    </div>
</div>
@if (session()->has('alert'))
<x-alert class="col-lg-10" />
@endif
<div class="table-responsive col-lg-10">
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
                <x-dashboard.destroy :slug="$post->slug"/>
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
