<div>
    @auth
        @if (Auth::user()->likesIdea($idea))
            <form action="{{ route('ideas.unlike', $idea->id) }}" method="post">
                @csrf
                <button type="submit" class="fw-light nav-link fs-6"> <span class="fas fa-heart me-1">
                    </span> {{ $idea->likes()->count() }} </button>
            </form>
        @else
            <form action="{{ route('ideas.like', $idea->id) }}" method="post">
                @csrf
                <button type="submit" class="fw-light nav-link fs-6"> <span class="far fa-heart me-1">
                    </span> {{ $idea->likes()->count() }} </button>
            </form>
        @endif
    @endauth
    @guest
        <!-- Показать что-то для неаутентифицированных пользователей, например, ссылку на страницу входа -->
        <a href="{{ route('login') }}"> <span class="far fa-heart me-1">
            </span> {{ $idea->likes()->count() }}</a>
    @endguest
</div>
