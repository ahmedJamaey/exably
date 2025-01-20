<?php

namespace App\Policies;

use App\Enums\RoleEnum;
use App\Models\User;

class UserPolicy
{
    public function update(User $user): bool
    {
        return $user->hasRole(RoleEnum::Admin->value);
    }

    public function delete(User $user): bool
    {
        return $user->hasRole(RoleEnum::Admin->value);
    }
}
