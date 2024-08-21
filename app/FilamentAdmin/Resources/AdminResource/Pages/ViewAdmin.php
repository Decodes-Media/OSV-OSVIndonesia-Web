<?php

namespace App\FilamentAdmin\Resources\AdminResource\Pages;

use App\FilamentAdmin\Resources\AdminResource;
use App\Models\Admin;
use Filament\Actions;
use Filament\Forms;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ViewRecord;
use Illuminate\Support\Facades\Hash;

class ViewAdmin extends ViewRecord
{
    protected static string $resource = AdminResource::class;

    protected function getActions(): array
    {
        return [
            Actions\EditAction::make('edit'),
            Actions\Action::make(__('Reset password'))
                ->modalWidth('lg')
                ->outlined()
                ->requiresConfirmation()
                ->form([
                    Forms\Components\TextInput::make('new_password')
                        ->label(__('New password'))
                        ->password()
                        ->required()
                        ->confirmed()
                        ->autocomplete('new-password'),
                    Forms\Components\TextInput::make('new_password_confirmation')
                        ->label(__('New password confirmation'))
                        ->password()
                        ->required()
                        ->autocomplete('new-password'),
                ])
                ->action(function (array $data) {
                    /** @var Admin $record */
                    $record = $this->record;
                    $record->password = Hash::make($data['new_password']);
                    $record->password_updated_at = now();
                    $record->save();
                    $msg = __('Successfully reset admin password');
                    Notification::make()->success()->title($msg)->send();
                }),
            Actions\DeleteAction::make()
                ->outlined()
                ->before(function (Actions\DeleteAction $action, self $livewire) {
                    //
                    /** @var Admin $record */
                    $record = $livewire->record;

                    if ($record->is_active) {
                        $msg = __('Failed, cannot delete active admin');
                        Notification::make()->danger()->title($msg)->send();
                        $action->cancel();
                    }

                    if ($record->id == filament_user_id()) {
                        $msg = __('Failed, cannot delete your self');
                        Notification::make()->danger()->title($msg)->send();
                        $action->cancel();
                    }

                    if ($record->email == config('base.superadmin_email')) {
                        $msg = __('Failed, cannot delete Superadmin user');
                        Notification::make()->danger()->title($msg)->send();
                        $action->cancel();
                    }
                }),
        ];
    }
}
