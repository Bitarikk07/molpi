<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Idea;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('admin', function (User $user): bool {
            return (bool) $user->is_admin;
        });

        // Gate::define('user.edit', function (User $user, $userid): bool {
        //     /// в этом случае у меня возникли траблы с передачей id юзера ,
        //     /// который передается по гет запросу.Дело в том что я передовал как $user->id. 
        //     /// То есть это никак не отличаслось от прежнего . Условие было ты ли ты?и я передаю id в переменную $userid и все
        //     return ((bool)$user->is_admin || auth()->user()->id === $userid->id);
        // });
    }
}
