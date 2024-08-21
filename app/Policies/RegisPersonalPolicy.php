<?php

namespace App\Policies;

use App\Models\RegisPersonal;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;
use Illuminate\Contracts\Auth\Access\Authorizable;

class RegisPersonalPolicy
{
    use HandlesAuthorization;

    public function viewAny(Authorizable $authorizable): Response|bool
    {
        return $authorizable->can('regis_personal.view');
    }

    public function view(Authorizable $authorizable, RegisPersonal $record): Response|bool
    {
        return $authorizable->can('regis_personal.view');
    }

    public function create(Authorizable $authorizable): Response|bool
    {
        return $authorizable->can('regis_personal.create');
    }

    public function update(Authorizable $authorizable, RegisPersonal $record): Response|bool
    {
        return $authorizable->can('regis_personal.update');
    }

    public function delete(Authorizable $authorizable, RegisPersonal $record): Response|bool
    {
        return $authorizable->can('regis_personal.delete');
    }

    public function deleteAny(Authorizable $authorizable): Response|bool
    {
        return $authorizable->can('regis_personal.delete');
    }

    public function forceDelete(Authorizable $authorizable, RegisPersonal $record): Response|bool
    {
        return $authorizable->can('regis_personal.delete');
    }

    public function forceDeleteAny(Authorizable $authorizable): Response|bool
    {
        return $authorizable->can('regis_personal.delete');
    }

    public function restore(Authorizable $authorizable, RegisPersonal $record): Response|bool
    {
        return $authorizable->can('regis_personal.create');
    }

    public function restoreAny(Authorizable $authorizable): Response|bool
    {
        return $authorizable->can('regis_personal.create');
    }

    public function replicate(Authorizable $authorizable, RegisPersonal $record): Response|bool
    {
        return $authorizable->can('regis_personal.create');
    }

    public function reorder(Authorizable $authorizable): Response|bool
    {
        return $authorizable->can('regis_personal.update');
    }

    public function export(Authorizable $authorizable): Response|bool
    {
        return $authorizable->can('regis_personal.export');
    }
}
