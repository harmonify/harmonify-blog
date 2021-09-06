@props(['slug'])

<form action="/dashboard/posts/{{ $slug }}" method="POST" class="d-inline-block">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-sm btn-danger text-decoration-none text-light" onclick="return confirm('Are you sure?')">
        <span data-feather="trash"></span>
        {{ $slot }}
    </button>
</form>