<?php

namespace App\FilamentAdmin\Pages;

use App\Settings\ProjectSetting;
use Filament\Actions;
use Filament\Forms\Components as FC;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Illuminate\Http\Response;
use FilamentTiptapEditor\TiptapEditor;

/**
 * @property \Filament\Forms\ComponentContainer $form
 */
class ProjectSettingPage extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $slug = 'projects/settings';

    protected static string $view = 'filament.pages.content-settings-page';

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static ?int $navigationSort = 1;

    protected ProjectSetting $setting;

    public bool $disableForm;

    public ?array $data = [];

    public static ?string $title = 'Setting';

    public static ?string $navigationLabel = 'Setting';

    public static function getNavigationGroup(): ?string
    {
        return __('Projects');
    }

    public static function shouldRegisterNavigation(): bool
    {
        return filament_user_can('system.site-setting');
    }

    public function getBreadcrumbs(): array
    {
        return [__('Projects'), __('Setting')];
    }

    public function boot(): void
    {
        /** @var ProjectSetting $setting */
        $setting = app(ProjectSetting::class);
        $this->setting = $setting;
    }

    public function mount(): void
    {
        abort_unless(static::shouldRegisterNavigation(), Response::HTTP_FORBIDDEN);

        $this->disableForm = request('mode', 'view') == 'view';

        if (request('save') == 'ok') {
            Notification::make()->success()->title(__('Saved'))->send();
        }

        $this->data = $this->setting->toArray();

        $this->form->fill($this->data);
    }

    public function submit(): void
    {
        $data = $this->form->getState();

        $this->setting->fill($data);
        $this->setting->save();

        redirect(static::getUrl(['save' => 'ok']));
    }

    public function form(Form $form): Form
    {
        return $form
            ->statePath('data')
            ->schema([
                FC\Section::make('Header Section')->schema([
                    FC\TextInput::make('title')
                            ->label('Title')
                            ->disabled($this->disableForm)
                            ->required()
                            ->afterStateHydrated(function ($set, $livewire) {
                                $set('title', $livewire->data['title']);
                            }),
                        TiptapEditor::make('desc')
                            ->label('Description')
                            ->columnSpanFull()
                            ->disk('public')
                            ->directory('uploads')
                            ->acceptedFileTypes(['image/jpg', 'image/jpeg', 'image/png'])
                            ->maxFileSize(2048)
                            ->extraInputAttributes(['style' => 'min-height: 320px;'])
                            ->disabled($this->disableForm)
                            ->required()
                            ->afterStateHydrated(function ($set, $livewire) {
                                $set('desc', $livewire->data['desc']);
                            }),
                    ]),
            ]);
    }

    public function getCancelButtonUrlProperty(): string
    {
        return static::getUrl();
    }

    protected function getActions(): array
    {
        return [
            Actions\EditAction::make()
                ->action(fn () => redirect(static::getUrl(['mode' => 'edit'])))
                ->visible(fn ($livewire) => $livewire->disableForm),
        ];
    }
}
