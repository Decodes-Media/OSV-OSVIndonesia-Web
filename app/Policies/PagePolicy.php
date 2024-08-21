<?php

namespace App\Policies;

use App\Models\Page;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;
use Illuminate\Contracts\Auth\Access\Authorizable;

class PagePolicy
{
    use HandlesAuthorization;

    public function viewAny(Authorizable $authorizable): Response|bool
    {
        return $authorizable->can('page.view');
    }

    public function view(Authorizable $authorizable, Page $record): Response|bool
    {
        return $authorizable->can('page.view');
    }

    public function create(Authorizable $authorizable): Response|bool
    {
        return $authorizable->can('page.create');
    }

    public function update(Authorizable $authorizable, Page $record): Response|bool
    {
        return $authorizable->can('page.update');
    }

    public function delete(Authorizable $authorizable, Page $record): Response|bool
    {
        return $authorizable->can('page.delete');
    }

    public function deleteAny(Authorizable $authorizable): Response|bool
    {
        return $authorizable->can('page.delete');
    }

    public function forceDelete(Authorizable $authorizable, Page $record): Response|bool
    {
        return $authorizable->can('page.delete');
    }

    public function forceDeleteAny(Authorizable $authorizable): Response|bool
    {
        return $authorizable->can('page.delete');
    }

    public function restore(Authorizable $authorizable, Page $record): Response|bool
    {
        return $authorizable->can('page.create');
    }

    public function restoreAny(Authorizable $authorizable): Response|bool
    {
        return $authorizable->can('page.create');
    }

    public function replicate(Authorizable $authorizable, Page $record): Response|bool
    {
        return $authorizable->can('page.create');
    }

    public function reorder(Authorizable $authorizable): Response|bool
    {
        return $authorizable->can('page.update');
    }

    public function export(Authorizable $authorizable): Response|bool
    {
        return $authorizable->can('page.export');
    }
}
