<?php

namespace App\Policies;

use App\Enums\RoleEnum;
use App\Models\User;

class UserPolicy
{
    public function viewAny(User $user): bool
    {
        $allowedRoles = [
            RoleEnum::System->value,
            RoleEnum::Admin->value,
            RoleEnum::User->value,
            RoleEnum::Employee->value,
        ];
        return $user->hasAnyRole($allowedRoles);
    }

    public function create(User $user): bool
    {
        return $user->hasRole(RoleEnum::Admin->value);
    }

    public function update(User $user): bool
    {
        return $user->hasRole(RoleEnum::Admin->value);
    }

    public function delete(User $user): bool
    {
        return $user->hasRole(RoleEnum::Admin->value);
    }
}
