<div class="card">
    <div class="px-3 pt-4 pb-2">
        <form method="post" enctype="multipart/form-data" action="{{ route('users.update', $user->id) }}">
            @csrf
            @method('put')
            <div class="px-3 pt-4 pb-2">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center">
                        @if ($user->getImageUrl())
                            <div class="me-3 avatar-sm rounded-circle"
                                style="background-image: url({{ $user->getImageUrl() }});width:150px; height: 150px; background-position: center;
                                background-size: cover;    border: 2px solid #fff;"
                                alt="{{ $user->name }}">
                            </div>
                        @else
                            <img style="width:150px" class="me-3 avatar-sm rounded-circle"
                                src="{{ $user->getImageUrl() }}" alt="{{ $user->name }}">
                        @endif

                        <div>
                            @if ($editing ?? false)
                                <input name="name" value="{{ $user->name }}" type="text" class="form-control">
                                @error('name')
                                    <small class="fs-6 text-danger">{{ $message }}</small>
                                @enderror
                            @else
                                <h3 class="card-title mb-0"><a href="#"> {{ $user->name }}
                                    </a></h3>
                                <span class="fs-6 text-muted">{{ $user->email }}</span>
                            @endif
                        </div>
                    </div>
                    <div>
                        @if ($editing ?? false)
                        @else
                            @auth
                                @can('update', $user)
                                    <a href="{{ route('users.edit', $user->id) }}">Edit</a>
                                @endcan
                            @endauth
                        @endif
                    </div>
                </div>

                @if ($editing ?? false)
                    <div class="mt-4">
                        <label for="image">Image</label>
                        <input type="file" name="image" class="form-control mt-1" id="image">
                        @error('image')
                            <small class="fs-6 text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                @endif
                <div class="px-2 mt-4">
                    <h5 class="fs-5"> Bio : </h5>
                    @if ($editing ?? false)
                        <div class="mb-3">
                            <textarea name="bio" class="form-control" id="bio" rows="3">{{ $user->bio }}</textarea>
                            @error('bio')
                                <small class="fs-6 text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <button class="btn btn-dark btn-sm mb-3">Save</button>
                    @else
                        <p class="fs-6 fw-light">
                            @if ($user->bio)
                                {{ $user->bio }}
                            @elseif (Auth::id() === $user->id)
                                You don't have a biography
                            @elseif (Auth::id() !== $user->id)
                                no bio
                            @endif
                        </p>
                    @endif
        </form>
        <div class="d-flex justify-content-start">
            <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-user me-1">
                </span> {{ $user->followers()->count() }} Followers </a>
            <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-brain me-1">
                </span> {{ $user->ideas()->count() }} </a>
            <a href="#" class= "fw-light nav-link fs-6 me-3"> <span class="fas fa-comment me-1">
                </span> {{ $user->comments()->count() }} </a>
            <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-heart me-1">
                </span> {{ $user->likes()->count() }} </a>
        </div>
        @auth
            @if (Auth::id() !== $user->id)
                <div class="mt-3">
                    @if (Auth::user()->follows($user))
                        <form method="post" action="{{ route('users.unfollow', $user->id) }}">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm"> Unfollow </button>
                        </form>
                    @elseif(Auth::user()->is_admin)
                        <h2 class="text-danger">admin can't follow</h2>
                    @else
                        <form method="post" action="{{ route('users.follow', $user->id) }}">
                            @csrf
                            <button type="submit" class="btn btn-primary btn-sm"> Follow </button>
                        </form>
                    @endif
                </div>
            @endif
        @endauth
    </div>
</div>
<hr>
@if ($editing ?? false)
@else
    @forelse ($ideas as $idea)
        <div class="mt-3">
            @include('shared.card')
        </div>
    @empty
        <p class="text-center my-4"> No results Found.</p>
    @endforelse
    <div class="mt-3">
        {{ $ideas->withQueryString()->links() }}
    </div>
@endif
</div>
</div>
<script></script>
