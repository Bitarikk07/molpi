<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class UserPolicy
{


    public function update(User $user, User $model): bool
    {
        // dd();
        return ($user->is_admin || $user->is($model));
    }



}
