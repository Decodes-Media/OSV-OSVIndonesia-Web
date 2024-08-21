<?php

namespace App\FilamentAdmin\Resources\AdminResource\Pages;

use App\FilamentAdmin\Resources\AdminResource;
use App\Models\Admin;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;

class CreateAdmin extends CreateRecord
{
    protected static string $resource = AdminResource::class;

    public function mount(): void
    {
        if (Admin::count() >= config('base.records_limit.admins')) {
            $msg = __('Cannot create new record, limit excedeed');
            Notification::make()->danger()->title($msg)->send();
            $this->redirect(URL::previous());
        }

        parent::mount();
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['password_updated_at'] = now();
        $data['password'] = Hash::make($data['password']);

        return $data;
    }
}
