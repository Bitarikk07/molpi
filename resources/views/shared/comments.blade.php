<div>
    @auth

        <form action="{{ route('ideas.comments.store', $idea->id) }}" method="POST">
            @csrf
            <div class="mb-3">
                <textarea name="content" class="fs-6 form-control" rows="1"></textarea>
            </div>
            <div>
                <button type="submit" class="btn btn-primary btn-sm"> Post Comment </button>
            </div>
        </form>
    @endauth
    @guest

    @endguest
    @foreach ($idea->comments as $comment)
        @if ($comment)
            <hr>

            <div class="d-flex align-items-start">
                @if ($comment->user->getImageUrl())
                    <div class="me-3 avatar-sm rounded-circle"
                        style="background-image: url({{ $comment->user->getImageUrl() }});width:27px; height: 25px; background-position: center;
                    background-size: cover;    border: 2px solid #fff;"
                        alt="{{ $comment->user->name }}">
                    </div>
                @else
                    <img style="width:150px" class="me-3 avatar-sm rounded-circle" src="{{ $user->getImageUrl() }}"
                        alt="{{ $comment->user->name }}">
                @endif

                <div class="w-100">
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('users.show', $comment->user->id) }}"
                            class="">{{ $comment->user->name }}
                        </a>
                        <small class="fs-6 fw-light text-muted">{{ $comment->created_at->diffForHumans() }}</small>
                    </div>
                    <p class="fs-6 mt-3 fw-light">
                        {{ $comment->content }}
                    </p>
                </div>
            </div>
        @else
        @endif
    @endforeach
</div>
