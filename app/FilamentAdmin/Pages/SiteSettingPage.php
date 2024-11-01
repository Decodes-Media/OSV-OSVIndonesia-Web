<?php

namespace App\FilamentAdmin\Pages;

use App\Models\Profile;
use App\Settings\SiteSetting;
use Filament\Actions;
use Filament\Forms\Components as FC;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Http\Response;
use FilamentTiptapEditor\TiptapEditor;

/**
 * @property \Filament\Forms\ComponentContainer $form
 */
class SiteSettingPage extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $slug = 'system/site-settings';

    protected static string $view = 'filament.pages.site-settings-page';

    protected static ?string $navigationIcon = 'heroicon-o-globe-alt';

    protected static ?int $navigationSort = 1;

    protected SiteSetting $setting;

    public bool $disableForm;

    public ?array $data = [];

    public function getTitle(): string|Htmlable
    {
        return __('Site Setting');
    }

    public static function getNavigationGroup(): ?string
    {
        return __('System');
    }

    public static function getNavigationLabel(): string
    {
        return __('Site Setting');
    }

    public static function shouldRegisterNavigation(): bool
    {
        return filament_user_can('system.site-setting');
    }

    public function getBreadcrumbs(): array
    {
        return [__('System'), __('Site Setting')];
    }

    public function boot(): void
    {
        /** @var SiteSetting $setting */
        $setting = app(SiteSetting::class);
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
                FC\Tabs::make('Main Setting')->schema([
                    FC\Tabs\Tab::make('Basic Info')->columns(2)->schema([
                        FC\TextInput::make('name')
                            ->label('Site Name')
                            ->columnSpanFull()
                            ->disabled($this->disableForm)
                            ->required()
                            ->afterStateHydrated(function ($set, $livewire) {
                                $set('name', $livewire->data['name']);
                            }),
                        FC\FileUpload::make('logo_white_path')
                            ->label('Light Logo')
                            ->disabled($this->disableForm)
                            ->imagePreviewHeight('256px')
                            ->directory('public')
                            ->getUploadedFileNameForStorageUsing(fn ($file) => uniqid().$file->hashName())
                            ->downloadable()
                            ->openable()
                            ->required()
                            ->maxSize(512),
                        FC\FileUpload::make('logo_black_path')
                            ->label('Dark Logo')
                            ->disabled($this->disableForm)
                            ->imagePreviewHeight('256px')
                            ->directory('public')
                            ->getUploadedFileNameForStorageUsing(fn ($file) => uniqid().$file->hashName())
                            ->downloadable()
                            ->openable()
                            ->required()
                            ->maxSize(512),
                        FC\TextInput::make('email')
                            ->label('Email')
                            ->columnSpanFull()
                            ->disabled($this->disableForm)
                            ->email()
                            ->required(),
                        FC\Fieldset::make('Instagram')->schema([
                            FC\TextInput::make('social_instagram_name')
                                ->label('Name')
                                ->disabled($this->disableForm)
                                ->required(),
                            FC\TextInput::make('social_instagram_url')
                                ->label('Link')
                                ->disabled($this->disableForm)
                                ->activeUrl()
                                ->required(),
                        ]),
                        FC\Fieldset::make('Linkedin')->schema([
                            FC\TextInput::make('social_linkedin_name')
                                ->label('Name')
                                ->disabled($this->disableForm)
                                ->required(),
                            FC\TextInput::make('social_linkedin_url')
                                ->label('Link')
                                ->disabled($this->disableForm)
                                ->activeUrl()
                                ->required(),
                        ]),
                        FC\Fieldset::make('Footer')->schema([
                            FC\TextInput::make('factory_text')
                                ->label('Factory Text')
                                ->disabled($this->disableForm)
                                ->required(),
                            FC\TextInput::make('factory_location_text')
                                ->label('Factory Location')
                                ->disabled($this->disableForm)
                                ->required(),
                            FC\TextInput::make('factory_link')
                                ->label('Factory Link')
                                ->disabled($this->disableForm)
                                ->activeUrl()
                                ->required(),
                            FC\TextInput::make('office_text')
                                ->label('Office Text')
                                ->disabled($this->disableForm)
                                ->required(),
                            FC\TextInput::make('office_location_text')
                                ->label('Office Location')
                                ->disabled($this->disableForm)
                                ->required(),
                            FC\TextInput::make('office_link')
                                ->label('Office Link')
                                ->disabled($this->disableForm)
                                ->activeUrl()
                                ->required(),
                            FC\TextInput::make('copyright')
                                ->label('Copyright')
                                ->disabled($this->disableForm)
                                ->required(),
                        ]),
                        TiptapEditor::make('privacy_policy')
                            ->label('Privacy Policy')
                            ->columnSpanFull()
                            ->disk('public')
                            ->directory('uploads')
                            ->acceptedFileTypes(['image/jpg', 'image/jpeg', 'image/png'])
                            ->maxFileSize(1024)
                            ->disabled($this->disableForm)
                            ->required()
                            ->afterStateHydrated(function ($set, $livewire) {
                                $set('privacy_policy', $livewire->data['privacy_policy']);
                            }),
                        TiptapEditor::make('term_conditions')
                            ->label('Term Conditions')
                            ->columnSpanFull()
                            ->disk('public')
                            ->directory('uploads')
                            ->acceptedFileTypes(['image/jpg', 'image/jpeg', 'image/png'])
                            ->maxFileSize(1024)
                            ->disabled($this->disableForm)
                            ->required()
                            ->afterStateHydrated(function ($set, $livewire) {
                                $set('term_conditions', $livewire->data['term_conditions']);
                            }),
                    ]),
                    FC\Tabs\Tab::make('Default SEO')->columns(2)->schema([
                        FC\FileUpload::make('seo_default.cover_path')
                            ->label('Cover')
                            ->columnSpanFull()
                            ->disabled($this->disableForm)
                            ->imagePreviewHeight('256px')
                            ->directory('uploads')
                            ->getUploadedFileNameForStorageUsing(fn ($file) => uniqid().$file->hashName())
                            ->downloadable()
                            ->openable()
                            ->required()
                            ->maxSize(512),
                        FC\TextInput::make('seo_default.author')
                            ->label('Author')
                            ->columnSpanFull()
                            ->disabled($this->disableForm)
                            ->required(),
                        FC\TagsInput::make('seo_default.keywords')
                            ->label('Keywords')
                            ->columnSpanFull()
                            ->disabled($this->disableForm)
                            ->separator(',')
                            ->required(),
                        FC\Textarea::make('seo_default.description')
                            ->label('Description')
                            ->columnSpanFull()
                            ->disabled($this->disableForm)
                            ->cols(2)
                            ->required(),
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
