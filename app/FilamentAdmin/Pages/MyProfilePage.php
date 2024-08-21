<?php

namespace App\FilamentAdmin\Pages;

use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;

/**
 * Thanks to https://github.com/ryangjchandler/filament-profile
 *
 * @property \Filament\Forms\ComponentContainer $form
 */
class MyProfilePage extends Page
{
    protected static ?string $slug = 'my/profile';

    protected static string $view = 'filament.pages.admin-profile-page';

    protected static bool $shouldRegisterNavigation = false;

    public mixed $name;

    public mixed $email;

    public mixed $current_password;

    public mixed $new_password;

    public mixed $new_password_confirmation;

    public function getHeading(): string
    {
        return __('My Profile');
    }

    public function mount(): void
    {
        $this->form->fill([
            'name' => filament_user()->name,
            'email' => filament_user()->email,
            'current_password' => '',
            'new_password' => '',
            'new_password_confirmation' => '',
        ]);
    }

    public function submit(): void
    {
        $this->form->getState();

        $state = array_filter([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->new_password ? Hash::make($this->new_password) : null,
        ]);

        $user = filament_user();

        $user->update($state);

        if ($this->new_password) {
            $this->updateSessionPassword($user);
        }

        try {
            //
            $this->reset(['current_password', 'new_password', 'new_password_confirmation']);
            //
        } catch (\Throwable $th) {
            // pass
        }

        $msg = __('Successfully update profile');
        Notification::make()->success()->title($msg)->send();
    }

    protected function updateSessionPassword(Authenticatable $user): void
    {
        request()->session()->put([
            'password_hash_admin' => $user->getAuthPassword(),
        ]);
    }

    public function getCancelButtonUrlProperty(): string
    {
        return static::getUrl();
    }

    public function getBreadcrumbs(): array
    {
        return [URL::current() => __('My Profile')];
    }

    protected function getFormSchema(): array
    {
        return [
            Section::make(__('About'))->columns(2)->schema([
                TextInput::make('name')
                    ->label(__('Name'))
                    ->disabled(fn () => $this->email == config('app.superadmin_email'))
                    ->required(),
                TextInput::make('email')
                    ->label(__('Email'))
                    ->disabled()
                    ->required(),
            ]),
            Section::make(__('Update Password'))->columns(2)->schema([
                TextInput::make('current_password')
                    ->label(__('Old password'))
                    ->password()
                    ->rules(['required_with:new_password'])
                    ->currentPassword()
                    ->autocomplete('off')
                    ->columnSpan(1),
                Grid::make()->schema([
                    TextInput::make('new_password')
                        ->label(__('New password'))
                        ->password()
                        ->rules(['confirmed'])
                        ->autocomplete('new-password'),
                    TextInput::make('new_password_confirmation')
                        ->label(__('New password confirmation'))
                        ->password()
                        ->requiredWith('new_password')
                        ->autocomplete('new-password'),
                ]),
            ]),
        ];
    }
}
