@extends('errors::minimal')

@section('title', __('Under Maintenance'))
@section('code', '503')
@section('message')
    {{ __($exception->getMessage()) ?: 'Under Maintenance' }}
    <i class="bi bi-exclamation-triangle"></i>
@endsection