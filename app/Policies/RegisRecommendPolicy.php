<?php

namespace App\Policies;

use App\Models\RegisRecommend;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;
use Illuminate\Contracts\Auth\Access\Authorizable;

class RegisRecommendPolicy
{
    use HandlesAuthorization;

    public function viewAny(Authorizable $authorizable): Response|bool
    {
        return $authorizable->can('regis_recommend.view');
    }

    public function view(Authorizable $authorizable, RegisRecommend $record): Response|bool
    {
        return $authorizable->can('regis_recommend.view');
    }

    public function create(Authorizable $authorizable): Response|bool
    {
        return $authorizable->can('regis_recommend.create');
    }

    public function update(Authorizable $authorizable, RegisRecommend $record): Response|bool
    {
        return $authorizable->can('regis_recommend.update');
    }

    public function delete(Authorizable $authorizable, RegisRecommend $record): Response|bool
    {
        return $authorizable->can('regis_recommend.delete');
    }

    public function deleteAny(Authorizable $authorizable): Response|bool
    {
        return $authorizable->can('regis_recommend.delete');
    }

    public function forceDelete(Authorizable $authorizable, RegisRecommend $record): Response|bool
    {
        return $authorizable->can('regis_recommend.delete');
    }

    public function forceDeleteAny(Authorizable $authorizable): Response|bool
    {
        return $authorizable->can('regis_recommend.delete');
    }

    public function restore(Authorizable $authorizable, RegisRecommend $record): Response|bool
    {
        return $authorizable->can('regis_recommend.create');
    }

    public function restoreAny(Authorizable $authorizable): Response|bool
    {
        return $authorizable->can('regis_recommend.create');
    }

    public function replicate(Authorizable $authorizable, RegisRecommend $record): Response|bool
    {
        return $authorizable->can('regis_recommend.create');
    }

    public function reorder(Authorizable $authorizable): Response|bool
    {
        return $authorizable->can('regis_recommend.update');
    }

    public function export(Authorizable $authorizable): Response|bool
    {
        return $authorizable->can('regis_recommend.export');
    }
}
