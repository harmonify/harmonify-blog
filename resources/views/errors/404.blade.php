@extends('errors::minimal')

@section('title', __('Not Found'))
@section('code', '404')
@section('message')
    {{ __($exception->getMessage()) ?: 'Not Found' }}
    <i class="bi bi-exclamation-triangle"></i>
    {{-- {{ $easterEgg ?? '' }} --}}
@endsection
