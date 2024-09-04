<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\User;

class UserPolicy
{
    public function update(User $user, User $model): bool
    {
        return $user->is($model);
    }
}
