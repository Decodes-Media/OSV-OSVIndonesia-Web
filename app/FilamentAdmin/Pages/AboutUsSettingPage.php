<?php

namespace App\FilamentAdmin\Pages;

use App\Settings\AboutUsSetting;
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
class AboutUsSettingPage extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $slug = 'about-us/settings';

    protected static string $view = 'filament.pages.aboutus-settings-page';

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static ?int $navigationSort = 1;

    protected AboutUsSetting $setting;

    public bool $disableForm;

    public ?array $data = [];

    public static ?string $title = 'Setting';

    public static ?string $navigationLabel = 'Setting';

    public static function getNavigationGroup(): ?string
    {
        return __('About Us');
    }

    public static function shouldRegisterNavigation(): bool
    {
        return filament_user_can('system.site-setting');
    }

    public function getBreadcrumbs(): array
    {
        return [__('About Us'), __('Setting')];
    }

    public function boot(): void
    {
        /** @var AboutUsSetting $setting */
        $setting = app(AboutUsSetting::class);
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
                FC\FileUpload::make('banner')
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
                        FC\TextInput::make('banner_title')
                            ->label('Title')
                            ->columnSpanFull()
                            ->disabled($this->disableForm)
                            ->required()
                            ->afterStateHydrated(function ($set, $livewire) {
                                $set('banner_title', $livewire->data['banner_title']);
                            }),
                    ]),
                    TiptapEditor::make('banner_desc')
                        ->label('Description')
                        ->columnSpanFull()
                        ->disk('public')
                        ->directory('uploads')
                        ->acceptedFileTypes(['image/jpg', 'image/jpeg', 'image/png'])
                        ->maxFileSize(2048)
                        ->extraInputAttributes(['style' => 'min-height: 320px;'])
                        ->required()
                        ->afterStateHydrated(function ($set, $livewire) {
                            $set('banner_desc', $livewire->data['banner_desc']);
                        }),
                    FC\FileUpload::make('fb_thumbnail1')
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
                            FC\TextInput::make('fb_title1')
                                ->label('Title')
                                ->columnSpanFull()
                                ->disabled($this->disableForm)
                                ->required()
                                ->afterStateHydrated(function ($set, $livewire) {
                                    $set('fb_title1', $livewire->data['fb_title1']);
                                }),
                            FC\TextInput::make('fb_desc1')
                                ->label('Desc')
                                ->columnSpanFull()
                                ->disabled($this->disableForm)
                                ->required()
                                ->afterStateHydrated(function ($set, $livewire) {
                                    $set('fb_desc1', $livewire->data['fb_desc1']);
                                }),
                        ]),
                    FC\FileUpload::make('fb_thumbnail2')
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
                            FC\TextInput::make('fb_title2')
                                ->label('Title')
                                ->columnSpanFull()
                                ->disabled($this->disableForm)
                                ->required()
                                ->afterStateHydrated(function ($set, $livewire) {
                                    $set('fb_title2', $livewire->data['fb_title2']);
                                }),
                            FC\TextInput::make('fb_desc2')
                                ->label('Desc')
                                ->columnSpanFull()
                                ->disabled($this->disableForm)
                                ->required()
                                ->afterStateHydrated(function ($set, $livewire) {
                                    $set('fb_desc2', $livewire->data['fb_desc2']);
                                }),
                        ]),
                    FC\FileUpload::make('fb_thumbnail3')
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
                            FC\TextInput::make('fb_title3')
                                ->label('Title')
                                ->columnSpanFull()
                                ->disabled($this->disableForm)
                                ->required()
                                ->afterStateHydrated(function ($set, $livewire) {
                                    $set('fb_title3', $livewire->data['fb_title3']);
                                }),
                            FC\TextInput::make('fb_desc3')
                                ->label('Desc')
                                ->columnSpanFull()
                                ->disabled($this->disableForm)
                                ->required()
                                ->afterStateHydrated(function ($set, $livewire) {
                                    $set('fb_desc3', $livewire->data['fb_desc3']);
                                }),
                        ]),
                    FC\FileUpload::make('fb_thumbnail4')
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
                            FC\TextInput::make('fb_title4')
                                ->label('Title')
                                ->columnSpanFull()
                                ->disabled($this->disableForm)
                                ->required()
                                ->afterStateHydrated(function ($set, $livewire) {
                                    $set('fb_title4', $livewire->data['fb_title4']);
                                }),
                            FC\TextInput::make('fb_desc4')
                                ->label('Desc')
                                ->columnSpanFull()
                                ->disabled($this->disableForm)
                                ->required()
                                ->afterStateHydrated(function ($set, $livewire) {
                                    $set('fb_desc4', $livewire->data['fb_desc4']);
                                }),
                        ]),

                    FC\FileUpload::make('sect1_thumbnail')
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
                            FC\TextInput::make('sect1_title')
                                ->label('Title')
                                ->columnSpanFull()
                                ->disabled($this->disableForm)
                                ->required()
                                ->afterStateHydrated(function ($set, $livewire) {
                                    $set('sect1_title', $livewire->data['sect1_title']);
                                }),
                            TiptapEditor::make('sect1_desc')
                                ->label('Description')
                                ->columnSpanFull()
                                ->disk('public')
                                ->directory('uploads')
                                ->acceptedFileTypes(['image/jpg', 'image/jpeg', 'image/png'])
                                ->maxFileSize(2048)
                                ->extraInputAttributes(['style' => 'min-height: 320px;'])
                                ->required()
                                ->afterStateHydrated(function ($set, $livewire) {
                                    $set('sect1_desc', $livewire->data['sect1_desc']);
                                }),
                        ]),

                    FC\FileUpload::make('sect2_thumbnail')
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
                            FC\TextInput::make('sect2_title')
                                ->label('Title')
                                ->columnSpanFull()
                                ->disabled($this->disableForm)
                                ->required()
                                ->afterStateHydrated(function ($set, $livewire) {
                                    $set('sect2_title', $livewire->data['sect2_title']);
                                }),
                            TiptapEditor::make('sect2_desc')
                                ->label('Description')
                                ->columnSpanFull()
                                ->disk('public')
                                ->directory('uploads')
                                ->acceptedFileTypes(['image/jpg', 'image/jpeg', 'image/png'])
                                ->maxFileSize(2048)
                                ->extraInputAttributes(['style' => 'min-height: 320px;'])
                                ->required()
                                ->afterStateHydrated(function ($set, $livewire) {
                                    $set('sect2_desc', $livewire->data['sect2_desc']);
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
