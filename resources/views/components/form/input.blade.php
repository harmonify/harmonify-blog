@props([
    'name',
    'type' => 'text',
    'label' => $name,
    'old' => '',
])
@php
// ddd(old($name), $old)
    
@endphp
<div class="mb-3">
    <x-form.label name="{{ $label }}" />
    {{-- @dd(old($name, $old)) --}}
    
    <input type="{{ $type }}"
        class="form-control @error($name) is-invalid @enderror"
        id="{{ $name }}"
        name="{{ $name }}"
        value="{{ old($name, $old) }}"
        autofocus autocomplete="off"
        {{ $attributes }}
    >
    
    <x-form.error name="{{ $name }}" />
</div>