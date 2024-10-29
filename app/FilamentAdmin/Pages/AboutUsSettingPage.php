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
use Filament\Forms\Get;

/**
 * @property \Filament\Forms\ComponentContainer $form
 */
class AboutUsSettingPage extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $slug = 'about-us/settings';

    protected static string $view = 'filament.pages.content-settings-page';

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
                FC\Section::make('Header Section')
                    ->schema([
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
                        FC\TextInput::make('banner_title')
                            ->label('Title')
                            ->disabled($this->disableForm)
                            ->required()
                            ->afterStateHydrated(function ($set, $livewire) {
                                $set('banner_title', $livewire->data['banner_title']);
                            }),
                        TiptapEditor::make('banner_desc')
                            ->label('Description')
                            ->columnSpanFull()
                            ->disk('public')
                            ->directory('uploads')
                            ->acceptedFileTypes(['image/jpg', 'image/jpeg', 'image/png'])
                            ->maxFileSize(1024)
                            ->disabled($this->disableForm)
                            ->required()
                            ->afterStateHydrated(function ($set, $livewire) {
                                $set('banner_desc', $livewire->data['banner_desc']);
                            }),
                    ]),
                FC\Section::make('Foundational Beliefs Section')
                    ->schema([
                        FC\Grid::make(['default' => 2])->schema([
                            FC\FileUpload::make('fb_thumbnail1')
                                ->label('Thumbnail 1')
                                ->columnSpanFull()
                                ->image()
                                ->imageEditor()
                                ->maxSize(1024)
                                ->directory('public')
                                ->disabled($this->disableForm)
                                ->required()
                                ->getUploadedFileNameForStorageUsing(fn ($file) => uniqid().$file->hashName())
                                ->openable()
                                ->downloadable(),
                            FC\TextInput::make('fb_title1')
                                ->label('Title 1')
                                ->disabled($this->disableForm)
                                ->required()
                                ->afterStateHydrated(function ($set, $livewire) {
                                    $set('fb_title1', $livewire->data['fb_title1']);
                                }),
                            FC\TextInput::make('fb_desc1')
                                ->label('Description 1')
                                ->disabled($this->disableForm)
                                ->required()
                                ->afterStateHydrated(function ($set, $livewire) {
                                    $set('fb_desc1', $livewire->data['fb_desc1']);
                                }),
                            FC\FileUpload::make('fb_thumbnail2')
                                ->label('Thumbnail 2')
                                ->columnSpanFull()
                                ->image()
                                ->imageEditor()
                                ->maxSize(1024)
                                ->directory('public')
                                ->disabled($this->disableForm)
                                ->required()
                                ->getUploadedFileNameForStorageUsing(fn ($file) => uniqid().$file->hashName())
                                ->openable()
                                ->downloadable(),
                            FC\TextInput::make('fb_title2')
                                ->label('Title 2')
                                ->disabled($this->disableForm)
                                ->required()
                                ->afterStateHydrated(function ($set, $livewire) {
                                    $set('fb_title2', $livewire->data['fb_title2']);
                                }),
                            FC\TextInput::make('fb_desc2')
                                ->label('Description 2')
                                ->disabled($this->disableForm)
                                ->required()
                                ->afterStateHydrated(function ($set, $livewire) {
                                    $set('fb_desc2', $livewire->data['fb_desc2']);
                                }),
                            FC\FileUpload::make('fb_thumbnail3')
                                ->label('Thumbnail 3')
                                ->columnSpanFull()
                                ->image()
                                ->imageEditor()
                                ->maxSize(1024)
                                ->directory('public')
                                ->disabled($this->disableForm)
                                ->required()
                                ->getUploadedFileNameForStorageUsing(fn ($file) => uniqid().$file->hashName())
                                ->openable()
                                ->downloadable(),
                            FC\TextInput::make('fb_title3')
                                ->label('Title 3')
                                ->disabled($this->disableForm)
                                ->required()
                                ->afterStateHydrated(function ($set, $livewire) {
                                    $set('fb_title3', $livewire->data['fb_title3']);
                                }),
                            FC\TextInput::make('fb_desc3')
                                ->label('Description 3')
                                ->disabled($this->disableForm)
                                ->required()
                                ->afterStateHydrated(function ($set, $livewire) {
                                    $set('fb_desc3', $livewire->data['fb_desc3']);
                                }), 
                            FC\FileUpload::make('fb_thumbnail4')
                                ->label('Thumbnail 4')
                                ->columnSpanFull()
                                ->image()
                                ->imageEditor()
                                ->maxSize(1024)
                                ->directory('public')
                                ->disabled($this->disableForm)
                                ->required()
                                ->getUploadedFileNameForStorageUsing(fn ($file) => uniqid().$file->hashName())
                                ->openable()
                                ->downloadable(),
                            FC\TextInput::make('fb_title4')
                                ->label('Title 4')
                                ->disabled($this->disableForm)
                                ->required()
                                ->afterStateHydrated(function ($set, $livewire) {
                                    $set('fb_title4', $livewire->data['fb_title4']);
                                }),
                            FC\TextInput::make('fb_desc4')
                                ->label('Description 4')
                                ->disabled($this->disableForm)
                                ->required()
                                ->afterStateHydrated(function ($set, $livewire) {
                                    $set('fb_desc4', $livewire->data['fb_desc4']);
                                }),
                        ]),
                    ]),
                FC\Section::make('Factory Section')
                    ->schema([
                        FC\TextInput::make('factory_title')
                        ->label('Title')
                        ->columnSpanFull()
                        ->disabled($this->disableForm)
                        ->required()
                        ->afterStateHydrated(function ($set, $livewire) {
                            $set('factory_title', $livewire->data['factory_title']);
                        }),
                    TiptapEditor::make('factory_desc')
                        ->label('Description')
                        ->columnSpanFull()
                        ->disk('public')
                        ->directory('uploads')
                        ->acceptedFileTypes(['image/jpg', 'image/jpeg', 'image/png'])
                        ->maxFileSize(1024)
                        ->disabled($this->disableForm)
                        ->required()->afterStateHydrated(function ($set, $livewire) {
                            $set('factory_desc', $livewire->data['factory_desc']);
                        }),
                    FC\Grid::make(['default' => 1])
                        ->schema([
                            FC\Select::make('factory_type')
                            ->label('Type')
                            ->options([
                                'thumbnail' => 'thumbnail',
                                'youtube' => 'youtube',
                            ])
                            ->live()
                            ->required()
                            ->disabled($this->disableForm)
                            ->afterStateUpdated(fn(FC\Select $component) => $component
                                ->getContainer()
                                ->getComponent('dynamicTypeFields')
                                ->getChildComponentContainer()
                                ->fill()),
                            FC\Grid::make(1)
                            ->schema(fn(Get $get): array => match ($get('factory_type')) {
                                'youtube' => [
                                    FC\TextInput::make('factory_youtube_url')
                                        ->label('Youtube URL')
                                        ->url()
                                        ->activeUrl()
                                        ->rule('regex:/^(https?:\/\/)?(www\.)?(youtube\.com|youtu\.be)\/.+$/')
                                        ->required()
                                        ->maxLength(255),
                                ],
                                'thumbnail' => [
                                    FC\FileUpload::make('factory_thumbnail')
                                        ->label('Thumbnail')
                                        ->columnSpanFull()
                                        ->image()
                                        ->imageEditor()
                                        ->maxSize(1024)
                                        ->directory('public')
                                        ->disabled($this->disableForm)
                                        ->required()
                                        ->getUploadedFileNameForStorageUsing(fn ($file) => uniqid().$file->hashName())
                                        ->openable()
                                        ->downloadable(),
                                ],
                                default => [],
                            })->key('dynamicTypeFields'),
                        ]),
                    ]),
                    FC\Section::make('Content Section')
                        ->schema([
                            FC\Repeater::make('content_data')
                                ->schema([
                                    FC\TextInput::make('content_title')
                                        ->label('Title')
                                        ->columnSpanFull()
                                        ->disabled($this->disableForm)
                                        ->required(),
                                    TiptapEditor::make('content_desc')
                                        ->label('Description')
                                        ->columnSpanFull()
                                        ->disk('public')
                                        ->directory('uploads')
                                        ->acceptedFileTypes(['image/jpg', 'image/jpeg', 'image/png'])
                                        ->maxFileSize(1024)
                                        ->disabled($this->disableForm)
                                        ->required(),
                                    FC\Grid::make(['default' => 1])
                                        ->schema([
                                            FC\Select::make('content_type')
                                            ->label('Type')
                                            ->options([
                                                'thumbnail' => 'thumbnail',
                                                'youtube' => 'youtube',
                                            ])
                                            ->live()
                                            ->disabled($this->disableForm)
                                            ->required()
                                            ->afterStateUpdated(fn(FC\Select $component) => $component
                                                ->getContainer()
                                                ->getComponent('dynamicTypeFields')
                                                ->getChildComponentContainer()
                                                ->fill()),
                                            FC\Grid::make(1)
                                            ->schema(fn(Get $get): array => match ($get('content_type')) {
                                                'youtube' => [
                                                    FC\TextInput::make('content_youtube_url')
                                                        ->label('Youtube URL')
                                                        ->url()
                                                        ->activeUrl()
                                                        ->rule('regex:/^(https?:\/\/)?(www\.)?(youtube\.com|youtu\.be)\/.+$/')
                                                        ->required()
                                                        ->maxLength(255),
                                                ],
                                                'thumbnail' => [
                                                    FC\FileUpload::make('content_thumbnail')
                                                        ->label('Thumbnail')
                                                        ->columnSpanFull()
                                                        ->image()
                                                        ->imageEditor()
                                                        ->maxSize(1024)
                                                        ->directory('public')
                                                        ->disabled($this->disableForm)
                                                        ->required()
                                                        ->getUploadedFileNameForStorageUsing(fn ($file) => uniqid().$file->hashName())
                                                        ->openable()
                                                        ->downloadable(),
                                                ],
                                                default => [],
                                            })->key('dynamicTypeFields'),
                                        ]),
                        ])->addActionLabel('Add Content Data'),
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
