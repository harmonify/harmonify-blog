@extends('components/dashboard/layout')

@section('container')

<x-dashboard.header>
    <x-slot name="title">
        All Categories
    </x-slot>
    <x-dashboard.toolbar />
</x-dashboard.header>

@if (session()->has('alert'))
<x-alert class="col-lg-10" />
@endif
<div class="table-responsive col-lg-10">
    <a href="/dashboard/categories/create" class="btn btn-primary mb-3 text-white text-decoration-none">
        <span data-feather="plus"></span>
        <span class="align-text-top">Create New Category</span>
    </a>
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Slug</th>
                <th scope="col">Created At</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($categories as $category)
        <tr>
            <th scope="row">{{ $loop->index + $categories->firstItem() }}</th>
            <td>{{ $category->name }}</td>
            <td>{{ $category->slug }}</td>
            <td>{{ $category->created_at->diffForHumans() }}</td>
            <td>
                <a href="/dashboard/categories/{{ $category->slug }}/edit" class="btn btn-sm btn-warning text-decoration-none text-light">
                    <span data-feather="edit"></span>
                </a>
                <x-dashboard.destroy action="/dashboard/categories/{{ $category->slug }}"/>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $categories->links() }}
    </div>
</div>
@endsection
