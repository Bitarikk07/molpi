<div class="col-3">
    <div class="card overflow-hidden">
        <div class="card-body pt-3">
            <ul class="nav nav-link-secondary flex-column fw-bold gap-2">
                <li class="nav-item">
                    <a class="{{ Route::is('dashboard') ? 'text-white bg-primary rounded' : '' }} nav-link"
                        href="{{ route('dashboard') }}">
                        <span>Главная</span></a>
                </li>
                <li class="nav-item">
                    <a class="{{ Route::is('terms') ? 'text-white bg-primary rounded' : '' }} nav-link"
                        href="{{ route('terms') }}">
                        <span>Правила</span></a>
                </li>
            </ul>
        </div>
        <div class="card-footer text-center py-2">
            <a class="{{ Route::is('profile') ? 'text-white bg-primary' : '' }}  btn btn-link btn-sm"
                href="{{ route('profile') }}">Мой профиль</a>
        </div>
    </div>
</div>
