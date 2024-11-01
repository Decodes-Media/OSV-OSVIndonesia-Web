<?php

namespace App\FilamentAdmin\Pages;

use App\Settings\ContactUsSetting;
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
class ContactUsSettingPage extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $slug = 'contact-us/settings';

    protected static string $view = 'filament.pages.content-settings-page';

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static ?int $navigationSort = 1;

    protected ContactUsSetting $setting;

    public bool $disableForm;

    public ?array $data = [];

    public static ?string $title = 'Setting';

    public static ?string $navigationLabel = 'Setting';

    public static function getNavigationGroup(): ?string
    {
        return __('Contact Us');
    }

    public static function shouldRegisterNavigation(): bool
    {
        return filament_user_can('system.site-setting');
    }

    public function getBreadcrumbs(): array
    {
        return [__('Contact Us'), __('Setting')];
    }

    public function boot(): void
    {
        /** @var ContactUsSetting $setting */
        $setting = app(ContactUsSetting::class);
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
                    FC\FileUpload::make('banner')
                        ->image()
                        ->imageEditor()
                        ->maxSize(1024)
                        ->directory('public')
                        ->disabled($this->disableForm)
                        ->required()
                        ->getUploadedFileNameForStorageUsing(fn ($file) => uniqid().$file->hashName())
                        ->openable()
                        ->downloadable(),
                    FC\FileUpload::make('catalog_cover')
                        ->image()
                        ->imageEditor()
                        ->maxSize(1024)
                        ->directory('public')
                        ->getUploadedFileNameForStorageUsing(fn ($file) => uniqid().$file->hashName())
                        ->openable()
                        ->downloadable(),
                    FC\FileUpload::make('company_document')
                        ->acceptedFileTypes(['application/pdf'])
                        ->maxSize(5120)
                        ->directory('public')
                        ->getUploadedFileNameForStorageUsing(fn ($file) => uniqid().$file->hashName())
                        ->openable()
                        ->downloadable(),
                ]),
                FC\Section::make('Factory Section')->schema([
                    FC\Grid::make(['default' => 2])->schema([
                        FC\TextInput::make('maps_title')
                            ->label('Title')
                            ->disabled($this->disableForm)
                            ->required()
                            ->afterStateHydrated(function ($set, $livewire) {
                                $set('maps_title', $livewire->data['maps_title']);
                            }),
                        FC\TextInput::make('maps_link')
                            ->label('Maps Link')
                            ->disabled($this->disableForm)
                            ->required()
                            ->activeUrl()
                            ->afterStateHydrated(function ($set, $livewire) {
                                $set('maps_link', $livewire->data['maps_link']);
                            }),
                        TiptapEditor::make('maps_desc')
                            ->label('Description')
                            ->columnSpanFull()
                            ->disk('public')
                            ->directory('uploads')
                            ->acceptedFileTypes(['image/jpg', 'image/jpeg', 'image/png'])
                            ->maxFileSize(2048)
                            ->required()
                            ->afterStateHydrated(function ($set, $livewire) {
                                $set('maps_desc', $livewire->data['maps_desc']);
                            }),
                        TiptapEditor::make('maps_bottom_text')
                            ->label('Bottom Text')
                            ->columnSpanFull()
                            ->profile('basic')
                            ->required()
                            ->afterStateHydrated(function ($set, $livewire) {
                                $set('maps_bottom_text', $livewire->data['maps_bottom_text']);
                            }),
                    ]),
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
