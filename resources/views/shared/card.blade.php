<div class="card">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                @if ($idea->user->getImageUrl())
                    <div class="me-3 avatar-sm rounded-circle"
                        style="background-image: url({{ $idea->user->getImageUrl() }});width:40px; height: 40px; background-position: center;
                background-size: cover;    border: 2px solid #fff;"
                        alt="{{ $idea->user->name }}">
                    </div>
                @else
                    <img style="width:150px" class="me-3 avatar-sm rounded-circle" src="{{ $user->getImageUrl() }}"
                        alt="{{ $idea->user->name }}">
                @endif

                <div>
                    <h5 class="card-title mb-0"><a href="{{ route('users.show', $idea->user->id) }}">
                            {{ $idea->user->name }}
                        </a></h5>
                </div>
            </div>
            <div class="">
                <form action="{{ route('ideas.destroy', $idea->id) }}" method="post">
                    @csrf
                    @method('delete')


                    @can('update', $idea)
                        <a href="{{ route('ideas.edit', $idea->id) }}">Edit</a>
                    @endcan

                    @if ($view ?? false)
                    @else
                        <a href="{{ route('ideas.show', $idea->id) }}">View</a>
                    @endif


                    @can('update', $idea)
                        <button class="m-2 btn btn-danger btn-sm "
                            onclick="return confirm('Вы точно хотите удалить идею?')">x</button>
                    @endcan
                </form>
            </div>
        </div>
    </div>
    <div class="card-body">
        @if ($editing ?? false)
            <form action="{{ route('ideas.update', $idea->id) }}" method="post">
                @csrf
                @method('put')
                <div class="mb-3">
                    <textarea name="content" class="form-control" id="content" rows="3"> {{ $idea->content }}</textarea>
                    @error('content')
                        <small class="fs-6 text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="">
                    <button type="submit" class="btn btn-dark mb-2 btn-sm"> Update </button>

                </div>
            </form>
        @else
            <p class="fs-6 fw-light text-muted">
                {{ $idea->content }}
            </p>
        @endif
        <div class="d-flex justify-content-between">
            @include('users.puts.like')
            <div>
                <span class="fs-6 fw-light text-muted"> <span class="fas fa-clock"> </span>
                    {{ $idea->created_at->diffForHumans() }} </span>
            </div>
        </div>
        @include('shared.comments')
    </div>
</div>
