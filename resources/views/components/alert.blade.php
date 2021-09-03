<div class="{{ $class }} d-flex alert alert-{{ session('alert.type') }}" role="alert">
    {{ session('alert.message') }}
    <button class="ms-auto btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
</div>