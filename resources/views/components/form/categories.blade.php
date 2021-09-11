@props([
    'name',
    'label',
    'categories',
    'old' => '',
])

<div class="mb-3">
    <x-form.label name="{{ $label }}" />
    
    <select class="form-select"
        id="{{ $label }}"
        name="{{ $name }}"
        @if ($attributes->get('required')) required @endif
    >
        <option selected value="1" class="text-muted">Choose a {{ $label }}</option>
        @foreach ($categories->skip(1) as $category)
            <option value="{{ $category->id }}"
                {{ old($name, $old) == $category->id ? 'selected' : '' }}
            >
                {{ $category->name }}
            </option>
        @endforeach
    </select>

    <x-form.error name="{{ $name }}" />
</div>