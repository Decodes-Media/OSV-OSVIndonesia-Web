<?php

namespace App\Policies;

use App\Models\Profile;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;
use Illuminate\Contracts\Auth\Access\Authorizable;

class ProfilePolicy
{
    use HandlesAuthorization;

    public function viewAny(Authorizable $authorizable): Response|bool
    {
        return $authorizable->can('profile.view');
    }

    public function view(Authorizable $authorizable, Profile $record): Response|bool
    {
        return $authorizable->can('profile.view');
    }

    public function create(Authorizable $authorizable): Response|bool
    {
        return $authorizable->can('profile.create');
    }

    public function update(Authorizable $authorizable, Profile $record): Response|bool
    {
        return $authorizable->can('profile.update');
    }

    public function delete(Authorizable $authorizable, Profile $record): Response|bool
    {
        return $authorizable->can('profile.delete');
    }

    public function deleteAny(Authorizable $authorizable): Response|bool
    {
        return $authorizable->can('profile.delete');
    }

    public function forceDelete(Authorizable $authorizable, Profile $record): Response|bool
    {
        return $authorizable->can('profile.delete');
    }

    public function forceDeleteAny(Authorizable $authorizable): Response|bool
    {
        return $authorizable->can('profile.delete');
    }

    public function restore(Authorizable $authorizable, Profile $record): Response|bool
    {
        return $authorizable->can('profile.create');
    }

    public function restoreAny(Authorizable $authorizable): Response|bool
    {
        return $authorizable->can('profile.create');
    }

    public function replicate(Authorizable $authorizable, Profile $record): Response|bool
    {
        return $authorizable->can('profile.create');
    }

    public function reorder(Authorizable $authorizable): Response|bool
    {
        return $authorizable->can('profile.update');
    }

    public function export(Authorizable $authorizable): Response|bool
    {
        return $authorizable->can('profile.export');
    }
}
