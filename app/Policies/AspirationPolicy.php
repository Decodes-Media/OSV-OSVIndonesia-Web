<?php

namespace App\Policies;

use App\Models\Aspiration;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;
use Illuminate\Contracts\Auth\Access\Authorizable;

class AspirationPolicy
{
    use HandlesAuthorization;

    public function viewAny(Authorizable $authorizable): Response|bool
    {
        return $authorizable->can('aspiration.view');
    }

    public function view(Authorizable $authorizable, Aspiration $record): Response|bool
    {
        return $authorizable->can('aspiration.view');
    }

    public function create(Authorizable $authorizable): Response|bool
    {
        return $authorizable->can('aspiration.create');
    }

    public function update(Authorizable $authorizable, Aspiration $record): Response|bool
    {
        return $authorizable->can('aspiration.update');
    }

    public function delete(Authorizable $authorizable, Aspiration $record): Response|bool
    {
        return $authorizable->can('aspiration.delete');
    }

    public function deleteAny(Authorizable $authorizable): Response|bool
    {
        return $authorizable->can('aspiration.delete');
    }

    public function forceDelete(Authorizable $authorizable, Aspiration $record): Response|bool
    {
        return $authorizable->can('aspiration.delete');
    }

    public function forceDeleteAny(Authorizable $authorizable): Response|bool
    {
        return $authorizable->can('aspiration.delete');
    }

    public function restore(Authorizable $authorizable, Aspiration $record): Response|bool
    {
        return $authorizable->can('aspiration.create');
    }

    public function restoreAny(Authorizable $authorizable): Response|bool
    {
        return $authorizable->can('aspiration.create');
    }

    public function replicate(Authorizable $authorizable, Aspiration $record): Response|bool
    {
        return $authorizable->can('aspiration.create');
    }

    public function reorder(Authorizable $authorizable): Response|bool
    {
        return $authorizable->can('aspiration.update');
    }

    public function export(Authorizable $authorizable): Response|bool
    {
        return $authorizable->can('aspiration.export');
    }
}
