<?php

namespace App\Policies;

use App\Models\Role;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;
use Illuminate\Contracts\Auth\Access\Authorizable;

class RolePolicy
{
    use HandlesAuthorization;

    public function viewAny(Authorizable $authorizable): Response|bool
    {
        return $authorizable->can('role.view');
    }

    public function view(Authorizable $authorizable, Role $record): Response|bool
    {
        return $authorizable->can('role.view');
    }

    public function create(Authorizable $authorizable): Response|bool
    {
        return $authorizable->can('role.create');
    }

    public function update(Authorizable $authorizable, Role $record): Response|bool
    {
        return $authorizable->can('role.update');
    }

    public function delete(Authorizable $authorizable, Role $record): Response|bool
    {
        return $authorizable->can('role.delete');
    }

    public function deleteAny(Authorizable $authorizable): Response|bool
    {
        return $authorizable->can('role.delete');
    }

    public function forceDelete(Authorizable $authorizable, Role $record): Response|bool
    {
        return $authorizable->can('role.delete');
    }

    public function forceDeleteAny(Authorizable $authorizable): Response|bool
    {
        return $authorizable->can('role.delete');
    }

    public function restore(Authorizable $authorizable, Role $record): Response|bool
    {
        return $authorizable->can('role.create');
    }

    public function restoreAny(Authorizable $authorizable): Response|bool
    {
        return $authorizable->can('role.create');
    }

    public function replicate(Authorizable $authorizable, Role $record): Response|bool
    {
        return $authorizable->can('role.create');
    }

    public function reorder(Authorizable $authorizable): Response|bool
    {
        return $authorizable->can('role.update');
    }

    public function export(Authorizable $authorizable): Response|bool
    {
        return $authorizable->can('role.export');
    }
}
