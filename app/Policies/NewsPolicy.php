<?php

namespace App\Policies;

use App\Models\News;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;
use Illuminate\Contracts\Auth\Access\Authorizable;

class NewsPolicy
{
    use HandlesAuthorization;

    public function viewAny(Authorizable $authorizable): Response|bool
    {
        return $authorizable->can('news.view');
    }

    public function view(Authorizable $authorizable, News $record): Response|bool
    {
        return $authorizable->can('news.view');
    }

    public function create(Authorizable $authorizable): Response|bool
    {
        return $authorizable->can('news.create');
    }

    public function update(Authorizable $authorizable, News $record): Response|bool
    {
        return $authorizable->can('news.update');
    }

    public function delete(Authorizable $authorizable, News $record): Response|bool
    {
        return $authorizable->can('news.delete');
    }

    public function deleteAny(Authorizable $authorizable): Response|bool
    {
        return $authorizable->can('news.delete');
    }

    public function forceDelete(Authorizable $authorizable, News $record): Response|bool
    {
        return $authorizable->can('news.delete');
    }

    public function forceDeleteAny(Authorizable $authorizable): Response|bool
    {
        return $authorizable->can('news.delete');
    }

    public function restore(Authorizable $authorizable, News $record): Response|bool
    {
        return $authorizable->can('news.create');
    }

    public function restoreAny(Authorizable $authorizable): Response|bool
    {
        return $authorizable->can('news.create');
    }

    public function replicate(Authorizable $authorizable, News $record): Response|bool
    {
        return $authorizable->can('news.create');
    }

    public function reorder(Authorizable $authorizable): Response|bool
    {
        return $authorizable->can('news.update');
    }

    public function export(Authorizable $authorizable): Response|bool
    {
        return $authorizable->can('news.export');
    }
}
