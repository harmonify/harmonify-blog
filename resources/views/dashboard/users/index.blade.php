@extends('components/dashboard/layout')

@section('container')

<x-dashboard.header>
    <x-slot name="title">
        All Users
    </x-slot>
    <x-dashboard.toolbar />
</x-dashboard.header>

@if (session()->has('alert'))
<x-alert class="col-xl-10" />
@endif
<div class="table-responsive col-xl-10">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Username</th>
                <th scope="col">Role</th>
                <th scope="col">Registered At</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($users as $user)
        <tr>
            <th scope="row">{{ $loop->index + $users->firstItem() }}</th>
            <td>{{ $user->name }}</td>
            <td>{{ $user->username }}</td>
            <td>{{ $user->role->name }}</td>
            <td>{{ $user->created_at->diffForHumans() }}</td>
            <td>
                <a href="/dashboard/users/{{ $user->username }}" class="btn btn-sm btn-info text-decoration-none text-light">
                    <span data-feather="eye"></span>
                </a>
                <a href="/dashboard/users/{{ $user->username }}/edit" class="btn btn-sm btn-warning text-decoration-none text-light">
                    <span data-feather="edit"></span>
                </a>
                <x-dashboard.destroy action="/dashboard/users/{{ $user->username }}"/>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $users->links() }}
    </div>
</div>
@endsection
