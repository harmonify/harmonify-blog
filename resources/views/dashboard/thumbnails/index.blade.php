@extends('components/dashboard/layout')

@section('container')

<x-dashboard.header>
    <x-slot name="title">
        All Thumbnails
    </x-slot>
    <x-dashboard.toolbar />
</x-dashboard.header>

@if (session()->has('alert'))
<x-alert class="col-lg-10" />
@endif
<div class="table-responsive col-lg-10">
    <a href="/dashboard/thumbnails/create" class="btn btn-primary mb-3 text-white text-decoration-none">
        <span data-feather="plus"></span>
        <span class="align-text-top">Create New Thumbnail</span>
    </a>
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Slug</th>
                <th scope="col">Created At</th>
                <th scope="col">URL</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($thumbnails as $thumbnail)
        <tr>
            <th scope="row">{{ $loop->index + $thumbnails->firstItem() }}</th>
            <td>{{ $thumbnail->name }}</td>
            <td>{{ $thumbnail->slug }}</td>
            <td>{{ $thumbnail->created_at->diffForHumans() }}</td>
            <td style="max-width: 150px; overflow: hidden !important">
                <input type="text" id="url{{ $loop->iteration }}" value="{{ $thumbnail->url }}" style="max-width: 100px" readonly>
                <button class="btn btn-sm flex-shrink-0" data-bs-toggle="tooltip" title="Copy thumbnail URL" onclick="copyText('#url{{ $loop->iteration }}')">
                    <span data-feather="copy"></span>
                </button>
            </td>
            <td>
                <a href="/dashboard/thumbnails/{{ $thumbnail->slug }}" class="btn btn-sm btn-info text-decoration-none text-light">
                    <span data-feather="eye"></span>
                </a>
                <a href="/dashboard/thumbnails/{{ $thumbnail->slug }}/edit" class="btn btn-sm btn-warning text-decoration-none text-light">
                    <span data-feather="edit"></span>
                </a>
                <x-dashboard.destroy action="/dashboard/thumbnails/{{ $thumbnail->slug }}"/>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $thumbnails->links() }}
    </div>
</div>
@endsection
