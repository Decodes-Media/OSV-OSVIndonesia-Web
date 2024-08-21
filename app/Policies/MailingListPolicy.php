<?php

namespace App\Policies;

use App\Models\MailingList;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;
use Illuminate\Contracts\Auth\Access\Authorizable;

class MailingListPolicy
{
    use HandlesAuthorization;

    public function viewAny(Authorizable $authorizable): Response|bool
    {
        return $authorizable->can('mailing_list.view');
    }

    public function view(Authorizable $authorizable, MailingList $record): Response|bool
    {
        return $authorizable->can('mailing_list.view');
    }

    public function create(Authorizable $authorizable): Response|bool
    {
        return $authorizable->can('mailing_list.create');
    }

    public function update(Authorizable $authorizable, MailingList $record): Response|bool
    {
        return $authorizable->can('mailing_list.update');
    }

    public function delete(Authorizable $authorizable, MailingList $record): Response|bool
    {
        return $authorizable->can('mailing_list.delete');
    }

    public function deleteAny(Authorizable $authorizable): Response|bool
    {
        return $authorizable->can('mailing_list.delete');
    }

    public function forceDelete(Authorizable $authorizable, MailingList $record): Response|bool
    {
        return $authorizable->can('mailing_list.delete');
    }

    public function forceDeleteAny(Authorizable $authorizable): Response|bool
    {
        return $authorizable->can('mailing_list.delete');
    }

    public function restore(Authorizable $authorizable, MailingList $record): Response|bool
    {
        return $authorizable->can('mailing_list.create');
    }

    public function restoreAny(Authorizable $authorizable): Response|bool
    {
        return $authorizable->can('mailing_list.create');
    }

    public function replicate(Authorizable $authorizable, MailingList $record): Response|bool
    {
        return $authorizable->can('mailing_list.create');
    }

    public function reorder(Authorizable $authorizable): Response|bool
    {
        return $authorizable->can('mailing_list.update');
    }

    public function export(Authorizable $authorizable): Response|bool
    {
        return $authorizable->can('mailing_list.export');
    }
}
