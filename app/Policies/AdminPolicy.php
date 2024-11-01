<?php

namespace App\Policies;

use App\Models\Admin;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;
use Illuminate\Contracts\Auth\Access\Authorizable;

class AdminPolicy
{
    use HandlesAuthorization;

    public function viewAny(Authorizable $authorizable): Response|bool
    {
        return $authorizable->can('admin.view');
    }

    public function view(Authorizable $authorizable, Admin $record): Response|bool
    {
        return $authorizable->can('admin.view');
    }

    public function create(Authorizable $authorizable): Response|bool
    {
        return $authorizable->can('admin.create');
    }

    public function update(Authorizable $authorizable, Admin $record): Response|bool
    {
        return $authorizable->can('admin.update');
    }

    public function delete(Authorizable $authorizable, Admin $record): Response|bool
    {
        return $authorizable->can('admin.delete');
    }

    public function deleteAny(Authorizable $authorizable): Response|bool
    {
        return $authorizable->can('admin.delete');
    }

    public function forceDelete(Authorizable $authorizable, Admin $record): Response|bool
    {
        return $authorizable->can('admin.delte');
    }

    public function forceDeleteAny(Authorizable $authorizable): Response|bool
    {
        return $authorizable->can('admin.delete');
    }

    public function restore(Authorizable $authorizable, Admin $record): Response|bool
    {
        return $authorizable->can('admin.create');
    }

    public function restoreAny(Authorizable $authorizable): Response|bool
    {
        return $authorizable->can('admin.create');
    }

    public function replicate(Authorizable $authorizable, Admin $record): Response|bool
    {
        return $authorizable->can('admin.create');
    }

    public function reorder(Authorizable $authorizable): Response|bool
    {
        return $authorizable->can('admin.update');
    }

    public function export(Authorizable $authorizable): Response|bool
    {
        return $authorizable->can('admin.export');
    }
}
