@props(['comment'])

<x-card>
    <article>
        <div class="d-flex p-3">
            <div class="d-none d-md-block me-3 flex-shrink-0">
                <img src="https://i.pravatar.cc/80?u={{ $comment->author->id }}" class="rounded-circle">
            </div>
    
            <div>
                <header>
                    <h4 class="fw-bold">{{ $comment->author->name }}</h4>
                    <p class="fs-6 lh-1"><span>@</span>{{ $comment->author->username }}</p>
                    <p class="fs-6 text-muted">
                        Posted
                        <time>{{ $comment->created_at->diffForHumans() }}</time>
                    </p>
                </header>
                <div>
                    {{ $comment->body }}
                </div>
            </div>
        </div>
    </article>
</x-card>