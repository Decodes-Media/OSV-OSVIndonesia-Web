<?php

namespace App\FilamentAdmin\Pages;

use App\Support\LogApplicationHelper;
use Filament\Actions;
use Filament\Forms\Components\Select;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Illuminate\Http\Response;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;

class LogApplicationPage extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $slug = 'system/log-application';

    protected static string $view = 'filament.pages.log-application-page';

    protected static ?string $navigationIcon = 'heroicon-o-command-line';

    protected static ?int $navigationSort = 2;

    public ?array $data = [
        'file' => null,
    ];

    public function getTitle(): string
    {
        return __('Application Logs');
    }

    public static function getNavigationGroup(): ?string
    {
        return __('System');
    }

    public static function getNavigationLabel(): string
    {
        return __('Application Logs');
    }

    public static function shouldRegisterNavigation(): bool
    {
        return filament_user_can('system.log_application');
    }

    public function mount(): void
    {
        abort_unless(static::shouldRegisterNavigation(), Response::HTTP_FORBIDDEN);
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('download-log-file')
                ->label(__('Download'))
                ->view('empty')
                ->action(function () {
                    if (filled(@$this->data['file'])) {
                        //
                        $file = LogApplicationHelper::pathToLogFile($this->data['file']);

                        $msg = __('Successfully download a log file');
                        Notification::make()->success()->title($msg)->send();

                        return response()->download($file);
                    }
                    $msg = __('No such file or directory');
                    Notification::make()->warning()->title($msg)->send();
                }),
            Actions\Action::make('delete-log-file')
                ->label(__('Delete'))
                ->view('empty')
                ->requiresConfirmation()
                ->action(function () {
                    if (filled(@$this->data['file'])) {
                        //
                        File::delete(LogApplicationHelper::pathToLogFile($this->data['file']));

                        $msg = __('Successfully delete a log file');
                        Notification::make()->success()->title($msg)->send();

                        return $this->dispatch('$refresh');
                    }
                    $msg = __('File does not exists');
                    Notification::make()->warning()->title($msg)->send();
                }),
        ];
    }

    public function form(Form $form): Form
    {
        return $form
            ->statePath('data')
            ->schema([
                Select::make('file')
                    ->hiddenLabel()
                    ->placeholder(__('Please choose a file to display'))
                    ->options(fn () => $this->getFileNames($this->getFinder())->sort())
                    ->optionsLimit(1000)
                    ->searchable()
                    ->live(),
            ]);
    }

    protected function getFileNames(Finder $files): Collection
    {
        return collect($files)->mapWithKeys(function (SplFileInfo $file) {
            return [$file->getRealPath() => $file->getRealPath()];
        });
    }

    protected function getFinder(): Finder
    {
        return Finder::create()
            ->ignoreDotFiles(true)
            ->ignoreUnreadableDirs()
            ->files()
            ->in(storage_path('logs'));
    }

    public function getLogs(): Collection
    {
        if (! @$this->data['file']) {
            return collect([]);
        }

        $logs = LogApplicationHelper::getAllForFile($this->data['file']);

        return collect($logs);
    }

    public function download(): mixed
    {
        return $this->mountAction('download-log-file');
    }

    public function delete(): mixed
    {
        return $this->mountAction('delete-log-file');
    }
}
