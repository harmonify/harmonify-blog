@extends('components/dashboard/layout')

@section('container')

<x-dashboard.header>
    <x-slot name="title">
        Edit User
    </x-slot>
</x-dashboard.header>

<a href="/dashboard/users" class="btn btn-outline-danger mb-3 text-decoration-none">
    <span data-feather="arrow-left"></span>
    <span class="align-text-top">Back to Users</span>
</a>
<div class="col-lg-8">
    <form action="/dashboard/users/{{ $user->username }}" method="POST">
        @csrf
        @method('PUT')
        
        <x-form.input name="name" :old="$user->name" required />
        <x-form.input name="username" :old="$user->username" required />
        <x-form.categories name="role_id" label="role" :categories="$roles" :old="$user->role_id" required />
        <x-form.input name="email" type="email" :old="$user->email" required />
        <x-form.input name="password" type="password" placeholder="<leave blank to persist old password>" />

        <button type="submit" class="btn btn-primary">Edit User</button>
    </form>
</div>
@endsection
