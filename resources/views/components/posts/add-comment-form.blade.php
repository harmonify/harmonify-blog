@auth
    <x-card>
        <form action="/posts/{{ $post->slug }}/comment" method="POST" class="p-3">
            @csrf
            <header class="d-flex align-items-center mb-4">
                <img src="https://i.pravatar.cc/80?u={{ auth()->id() }}" class="rounded-circle">
                <h2 class="lead ms-3">Want to discuss about this post?</h2>
            </header>
            <div class="mb-4">
                <textarea name="body" class="bg-dark border-secondary border-start-0 border-end-0 text-white w-100" rows="10" placeholder="Quick, think of something to say!" style="resize: none"></textarea>
                @error('body')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="">
                <button class="bg-primary border-0 text-white fw-bold fs-6 py-2 px-3 rounded-2">
                    Submit
                </button>
            </div>
        </form>
    </x-card>
@else
    <h2 class="lead mb-4">
        <a href="/register" class="text-white">Register</a> or <a href="/login" class="text-white">log in</a> to leave a comment.
    </h2>
@endauth
