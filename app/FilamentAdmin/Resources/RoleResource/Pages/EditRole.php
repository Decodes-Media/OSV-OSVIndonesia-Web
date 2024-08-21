<?php

namespace App\FilamentAdmin\Resources\RoleResource\Pages;

use App\FilamentAdmin\Resources\RoleResource;
use App\Models\Permission;
use App\Models\Role;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;

class EditRole extends EditRecord
{
    protected static string $resource = RoleResource::class;

    protected function getActions(): array
    {
        return [Actions\ViewAction::make()];
    }

    protected function beforeValidate(): void
    {
        if ($this->record?->name == 'Superadmin') {
            $msg = __('Failed, cannot edit Superadmin role');
            Notification::make()->danger()->title($msg)->send();
            $this->halt();
        }
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        return RoleResource::mutateDateForPermissions($data);
    }

    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        /** @var Role $record */
        $record = $record->update([
            'name' => $data['name'],
            'guard_name' => $data['guard_name'],
        ]);

        $permissionIds = Permission::whereIn('name', $data['permissions'])->pluck('id');

        $record->permissions()->sync($permissionIds);

        return $record;
    }
}
