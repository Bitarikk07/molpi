@auth()
    <h4> Поделитесь своей идеей</h4>
    <div class="row">
        <form action="{{ route('ideas.send_idea') }}" method="post">
            @csrf
            <div class="mb-3">
                <textarea name="content" class="form-control" id="content" rows="3"></textarea>
                @error('content')
                    <small class="fs-6 text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="">
                <button type="submit" class="btn btn-dark btn-sm"> Опубликовать </button>

            </div>
        </form>
    </div>
@endauth
@guest()
    <h4>Login To Share yours ideas </h4>
@endguest
<div class="mt-5">@include('shared.filter')</div>
