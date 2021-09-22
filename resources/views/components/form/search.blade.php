@props([
    'name',
    'label' => $name,
    'old' => '',
    'dataset',
])

<div class="mb-3">
    <x-form.label name="{{ $label }}" />
    
    <input type="search"
        class="form-control @error($name) is-invalid @enderror"
        name="{{ $name }}"
        list="{{ $name }}"
        value="{{ old($name, $old) }}"
        autofocus autocomplete="off"
        {{ $attributes }}
    >
    <datalist id="{{ $name }}">
        @foreach ($dataset as $item)
            <option value="{{ $item->url }}">{{ $item->name }}</option>
        @endforeach
     </datalist>
    
    <x-form.error name="{{ $name }}" />
</div>