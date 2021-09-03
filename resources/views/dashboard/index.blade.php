@extends('components/dashboard/layout')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Welcome back, {{ auth()->user()->name }}</h1>
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
@endsection
