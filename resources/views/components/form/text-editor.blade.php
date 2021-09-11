@props([
    'name',
    'label' => $name,
    'old' => '',
])

<div class="mb-3">
    <x-form.label name="{{ $label }}" />
        
    <input id="{{ $name }}"
        type="hidden"
        name="{{ $name }}"
        class="@error($name) is-invalid @enderror"
        value="{{ old($name, $old) }}"
        @if ($attributes->get('required')) required @endif
    >
    <trix-editor input="{{ $name }}" style="min-height: 30vh"></trix-editor>
    
    <x-form.error name="{{ $name }}" />
</div>