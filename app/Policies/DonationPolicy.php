<?php

namespace App\Policies;

use App\Models\Donation;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;
use Illuminate\Contracts\Auth\Access\Authorizable;

class DonationPolicy
{
    use HandlesAuthorization;

    public function viewAny(Authorizable $authorizable): Response|bool
    {
        return $authorizable->can('donation.view');
    }

    public function view(Authorizable $authorizable, Donation $record): Response|bool
    {
        return $authorizable->can('donation.view');
    }

    public function create(Authorizable $authorizable): Response|bool
    {
        return $authorizable->can('donation.create');
    }

    public function update(Authorizable $authorizable, Donation $record): Response|bool
    {
        return $authorizable->can('donation.update');
    }

    public function delete(Authorizable $authorizable, Donation $record): Response|bool
    {
        return $authorizable->can('donation.delete');
    }

    public function deleteAny(Authorizable $authorizable): Response|bool
    {
        return $authorizable->can('donation.delete');
    }

    public function forceDelete(Authorizable $authorizable, Donation $record): Response|bool
    {
        return $authorizable->can('donation.delete');
    }

    public function forceDeleteAny(Authorizable $authorizable): Response|bool
    {
        return $authorizable->can('donation.delete');
    }

    public function restore(Authorizable $authorizable, Donation $record): Response|bool
    {
        return $authorizable->can('donation.create');
    }

    public function restoreAny(Authorizable $authorizable): Response|bool
    {
        return $authorizable->can('donation.create');
    }

    public function replicate(Authorizable $authorizable, Donation $record): Response|bool
    {
        return $authorizable->can('donation.create');
    }

    public function reorder(Authorizable $authorizable): Response|bool
    {
        return $authorizable->can('donation.update');
    }

    public function export(Authorizable $authorizable): Response|bool
    {
        return $authorizable->can('donation.export');
    }
}
