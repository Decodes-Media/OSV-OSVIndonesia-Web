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

    protected static string $view = 'filament.pages.contactus-settings-page';

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
                FC\FileUpload::make('catalog_cover')
                    ->hiddenLabel()
                    ->image()
                    ->imageEditor()
                    ->imageCropAspectRatio('16:9')
                    ->imagePreviewHeight('320px')
                    ->maxSize(2048)
                    ->directory('public')
                    ->getUploadedFileNameForStorageUsing(fn ($file) => uniqid().$file->hashName())
                    ->openable()
                    ->downloadable(),
                FC\Grid::make(['default' => 2])
                    ->schema([
                        FC\TextInput::make('maps_title')
                            ->label('Title')
                            ->columnSpanFull()
                            ->disabled($this->disableForm)
                            ->required()
                            ->afterStateHydrated(function ($set, $livewire) {
                                $set('maps_title', $livewire->data['maps_title']);
                            }),
                        FC\TextInput::make('maps_link')
                            ->label('Link')
                            ->columnSpanFull()
                            ->disabled($this->disableForm)
                            ->required()
                            ->activeUrl()
                            ->afterStateHydrated(function ($set, $livewire) {
                                $set('maps_link', $livewire->data['maps_link']);
                            }),
                    ]),
                    TiptapEditor::make('maps_desc')
                        ->label('Description')
                        ->columnSpanFull()
                        ->disk('public')
                        ->directory('uploads')
                        ->acceptedFileTypes(['image/jpg', 'image/jpeg', 'image/png'])
                        ->maxFileSize(2048)
                        ->extraInputAttributes(['style' => 'min-height: 320px;'])
                        ->required()
                        ->afterStateHydrated(function ($set, $livewire) {
                            $set('maps_desc', $livewire->data['maps_desc']);
                        }),
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
