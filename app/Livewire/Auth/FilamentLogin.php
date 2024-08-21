<?php

namespace App\Livewire\Auth;

use DanHarrin\LivewireRateLimiting\Exceptions\TooManyRequestsException;
use Filament\Facades\Filament;
use Filament\Http\Responses\Auth\Contracts\LoginResponse;
use Filament\Notifications\Notification;
use Filament\Pages\Auth\Login as BaseComponent;
use Illuminate\Validation\ValidationException;

class FilamentLogin extends BaseComponent
{
    public function authenticate(): ?LoginResponse
    {
        try {
            $this->rateLimit(5);
        } catch (TooManyRequestsException $exception) {
            //
            $key = 'filament-panels::pages/auth/login.notifications.throttled';

            Notification::make()
                ->title(__("{$key}.title", [
                    'seconds' => $exception->secondsUntilAvailable,
                    'minutes' => ceil($exception->secondsUntilAvailable / 60),
                ]))
                ->body(__("{$key}.body", [
                    'seconds' => $exception->secondsUntilAvailable,
                    'minutes' => ceil($exception->secondsUntilAvailable / 60),
                ]))
                ->danger()
                ->send();

            return null;
        }

        $data = $this->form->getState();

        $credential = $this->getCredentialsFromFormData($data);

        $logProperties = ['attributes' => [
            'email' => $data['email'],
            'from_ip_address' => request()->ip(),
            'from_user_agent' => request()->userAgent(),
        ]];

        if (! Filament::auth()->attempt($credential, $data['remember'] ?? false)) {
            //
            activity('Authentication')
                ->event('Login')
                ->withProperties($logProperties)
                ->log(__('Failed to login with email :email.', ['email' => $data['email']]));

            throw ValidationException::withMessages([
                'data.email' => __('filament-panels::pages/auth/login.messages.failed'),
            ]);
        }

        $user = filament_user();

        $user->disableLogging()->update(['last_login_at' => now()]);

        activity('Authentication')
            ->event('Login')
            ->causedBy($user)
            ->withProperties($logProperties)
            ->log(__('Successfully login with email :email.', ['email' => $data['email']]));

        session()->regenerate();

        return app(LoginResponse::class);
    }
}
