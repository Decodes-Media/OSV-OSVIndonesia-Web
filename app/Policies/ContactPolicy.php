<?php

namespace App\Policies;

use App\Models\Contact;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;
use Illuminate\Contracts\Auth\Access\Authorizable;

class ContactPolicy
{
    use HandlesAuthorization;

    public function viewAny(Authorizable $authorizable): Response|bool
    {
        return $authorizable->can('contact.view');
    }

    public function view(Authorizable $authorizable, Contact $record): Response|bool
    {
        return $authorizable->can('contact.view');
    }

    public function create(Authorizable $authorizable): Response|bool
    {
        return $authorizable->can('contact.create');
    }

    public function update(Authorizable $authorizable, Contact $record): Response|bool
    {
        return $authorizable->can('contact.update');
    }

    public function delete(Authorizable $authorizable, Contact $record): Response|bool
    {
        return $authorizable->can('contact.delete');
    }

    public function deleteAny(Authorizable $authorizable): Response|bool
    {
        return $authorizable->can('contact.delete');
    }

    public function forceDelete(Authorizable $authorizable, Contact $record): Response|bool
    {
        return $authorizable->can('contact.delete');
    }

    public function forceDeleteAny(Authorizable $authorizable): Response|bool
    {
        return $authorizable->can('contact.delete');
    }

    public function restore(Authorizable $authorizable, Contact $record): Response|bool
    {
        return $authorizable->can('contact.create');
    }

    public function restoreAny(Authorizable $authorizable): Response|bool
    {
        return $authorizable->can('contact.create');
    }

    public function replicate(Authorizable $authorizable, Contact $record): Response|bool
    {
        return $authorizable->can('contact.create');
    }

    public function reorder(Authorizable $authorizable): Response|bool
    {
        return $authorizable->can('contact.update');
    }

    public function export(Authorizable $authorizable): Response|bool
    {
        return $authorizable->can('contact.export');
    }
}
