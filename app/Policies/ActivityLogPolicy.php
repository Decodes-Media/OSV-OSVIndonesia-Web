<?php

namespace App\Policies;

use App\Models\ActivityLog;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;
use Illuminate\Contracts\Auth\Access\Authorizable;

class ActivityLogPolicy
{
    use HandlesAuthorization;

    public function viewAny(Authorizable $authorizable): Response|bool
    {
        return $authorizable->can('system.log_application');
    }

    public function view(Authorizable $authorizable, ActivityLog $record): Response|bool
    {
        return $authorizable->can('system.log_application');
    }

    public function create(Authorizable $authorizable): Response|bool
    {
        return $authorizable->can('system.log_application');
    }

    public function update(Authorizable $authorizable, ActivityLog $record): Response|bool
    {
        return $authorizable->can('system.log_application');
    }

    public function delete(Authorizable $authorizable, ActivityLog $record): Response|bool
    {
        return $authorizable->can('system.log_application');
    }

    public function deleteAny(Authorizable $authorizable): Response|bool
    {
        return $authorizable->can('system.log_application');
    }

    public function forceDelete(Authorizable $authorizable, ActivityLog $record): Response|bool
    {
        return $authorizable->can('system.log_application');
    }

    public function forceDeleteAny(Authorizable $authorizable): Response|bool
    {
        return $authorizable->can('system.log_application');
    }

    public function restore(Authorizable $authorizable, ActivityLog $record): Response|bool
    {
        return $authorizable->can('system.log_application');
    }

    public function restoreAny(Authorizable $authorizable): Response|bool
    {
        return $authorizable->can('system.log_application');
    }

    public function replicate(Authorizable $authorizable, ActivityLog $record): Response|bool
    {
        return $authorizable->can('system.log_application');
    }

    public function reorder(Authorizable $authorizable): Response|bool
    {
        return $authorizable->can('system.log_application');
    }

    public function export(Authorizable $authorizable): Response|bool
    {
        return $authorizable->can('system.log_application');
    }
}
