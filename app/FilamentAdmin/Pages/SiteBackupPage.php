<?php

namespace App\FilamentAdmin\Pages;

use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Support\Enums\Alignment;
use Illuminate\Console\Command;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;

class SiteBackupPage extends Page
{
    protected static ?string $slug = 'system/site-backup';

    protected static string $view = 'filament.pages.site-backup-page';

    protected static ?string $navigationIcon = 'heroicon-o-server-stack';

    protected static ?int $navigationSort = 4;
    
    protected static bool $shouldRegisterNavigation = false;

    public function getTitle(): string
    {
        return __('Site Backups');
    }

    public static function getNavigationGroup(): ?string
    {
        return __('System');
    }

    public static function getNavigationLabel(): string
    {
        return __('Site Backups');
    }

    // public static function shouldRegisterNavigation(): bool
    // {
    //     return filament_user_can('system.site_backup');
    // }

    public function mount(): void
    {
        abort_unless(static::shouldRegisterNavigation(), Response::HTTP_UNAUTHORIZED);
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('act-create-backup')
                ->button()
                ->label(__('Create backup'))
                ->icon('heroicon-o-plus')
                ->modalHeading(__('Create new backup'))
                ->modalDescription(__('Please choose type of backup'))
                ->modalContent(view('filament.components.site-backup-modal'))
                ->modalFooterActions(null)
                ->modalFooterActionsAlignment(Alignment::Center),
        ];
    }

    public function create(string $option = ''): void
    {
        $prefix = $option ? str_replace('_', '-', $option).'-' : '';

        $filename = $prefix.date('Y-m-d-H-i-s').'.zip';

        $arguments = "--disable-notifications --filename={$filename}";

        $exitCode = match ($option) {
            'only-db' => Artisan::call("backup:run --only-db $arguments"),
            'only-files' => Artisan::call("backup:run --only-files $arguments"),
            default => Artisan::call("backup:run $arguments"),
        };

        $exitCode == Command::SUCCESS
            ? Notification::make('backup-success')
                ->success()
                ->title(__('Successfully create a backup'))
                ->body(Str::limit(Artisan::output(), 300))
                ->send()
            : Notification::make('backup-fail')
                ->danger()
                ->title(__('Failed, something went wrong'))
                ->body(Str::limit(Artisan::output(), 300))
                ->send();
    }
}
