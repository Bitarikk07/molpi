@if (session()->has('message'))
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
        {{ session('message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    {{-- <div class="alert alert-dismissible alert-secondary">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <strong>Well done!</strong> You successfully read <a href="#" class="alert-link">this important alert
            message</a>.
    </div> --}}
@endif
