<?php

namespace App\Policies;

use App\Models\SchoolProfile;
use App\Models\User;

class SchoolProfilePolicy
{
    public function viewAny(User $user): bool
    {
        return $user->isAdmin();
    }

    public function view(User $user, SchoolProfile $profile): bool
    {
        return $user->isAdmin();
    }

    public function create(User $user): bool
    {
        return $user->isAdmin();
    }

    public function update(User $user, SchoolProfile $profile): bool
    {
        return $user->isAdmin();
    }

    public function delete(User $user, SchoolProfile $profile): bool
    {
        return $user->isAdmin();
    }
}
