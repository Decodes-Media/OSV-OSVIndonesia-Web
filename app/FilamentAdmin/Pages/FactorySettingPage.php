<?php

namespace App\FilamentAdmin\Pages;

use App\Settings\FactorySetting;
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
class FactorySettingPage extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $slug = 'factory/settings';

    protected static string $view = 'filament.pages.content-settings-page';

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static ?int $navigationSort = 1;

    protected FactorySetting $setting;

    public bool $disableForm;

    public ?array $data = [];

    public static ?string $title = 'Setting';

    public static ?string $navigationLabel = 'Setting';

    public static function getNavigationGroup(): ?string
    {
        return __('Factory');
    }

    public static function shouldRegisterNavigation(): bool
    {
        return filament_user_can('system.site-setting');
    }

    public function getBreadcrumbs(): array
    {
        return [__('Factory'), __('Setting')];
    }

    public function boot(): void
    {
        /** @var FactorySetting $setting */
        $setting = app(FactorySetting::class);
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
                            ->maxFileSize(1024)
                            ->disabled($this->disableForm)
                            ->required()
                            ->afterStateHydrated(function ($set, $livewire) {
                                $set('desc', $livewire->data['desc']);
                            }),
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
                                        ->required()
                                        ->disabled($this->disableForm)
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
                        ])
                        ->addActionLabel('Add Content Data'),
                    ]),
                FC\Section::make('Statistic Section')
                    ->schema([
                        FC\Repeater::make('statistic_data')
                            ->schema([
                                FC\Grid::make(['default' => 2])->schema([
                                    FC\FileUpload::make('stat_thumb')
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
                                    FC\TextInput::make('stat_title')
                                        ->label('Title')
                                        ->disabled($this->disableForm)
                                        ->required(),
                                    FC\TextInput::make('state_desc')
                                        ->label('Description')
                                        ->disabled($this->disableForm)
                                        ->required()
                                ]),
                        ])->minItems(3)
                        ->addActionLabel('Add Statistic Data'),
                    ]),
                FC\Section::make('Certificate Section')
                    ->schema([
                        FC\TextInput::make('cert_title')
                            ->label('Title')
                            ->columnSpanFull()
                            ->disabled($this->disableForm)
                            ->required()
                            ->afterStateHydrated(function ($set, $livewire) {
                                $set('cert_title', $livewire->data['cert_title']);
                            }),
                        TiptapEditor::make('cert_desc')
                            ->label('Description')
                            ->columnSpanFull()
                            ->disk('public')
                            ->directory('uploads')
                            ->acceptedFileTypes(['image/jpg', 'image/jpeg', 'image/png'])
                            ->maxFileSize(1024)
                            ->disabled($this->disableForm)
                            ->required()
                            ->afterStateHydrated(function ($set, $livewire) {
                                $set('cert_desc', $livewire->data['cert_desc']);
                            }),
                        FC\Grid::make(['default' => 2])->schema([
                            FC\FileUpload::make('cert_image1')
                                ->label('Image 1')
                                ->image()
                                ->imageEditor()
                                ->maxSize(1024)
                                ->directory('public')
                                ->disabled($this->disableForm)
                                ->required()
                                ->getUploadedFileNameForStorageUsing(fn ($file) => uniqid().$file->hashName())
                                ->openable()
                                ->downloadable(),
                            FC\FileUpload::make('cert_image2')
                                ->label('Image 2')
                                ->image()
                                ->imageEditor()
                                ->maxSize(1024)
                                ->directory('public')
                                ->disabled($this->disableForm)
                                ->getUploadedFileNameForStorageUsing(fn ($file) => uniqid().$file->hashName())
                                ->openable()
                                ->downloadable(),
                            FC\FileUpload::make('cert_image3')
                                ->label('Image 3')
                                ->image()
                                ->imageEditor()
                                ->maxSize(1024)
                                ->directory('public')
                                ->disabled($this->disableForm)
                                ->getUploadedFileNameForStorageUsing(fn ($file) => uniqid().$file->hashName())
                                ->openable()
                                ->downloadable(),
                            FC\FileUpload::make('cert_image4')
                                ->label('Image 4')
                                ->image()
                                ->imageEditor()
                                ->maxSize(1024)
                                ->directory('public')
                                ->disabled($this->disableForm)
                                ->getUploadedFileNameForStorageUsing(fn ($file) => uniqid().$file->hashName())
                                ->openable()
                                ->downloadable(),
                            FC\FileUpload::make('cert_image5')
                                ->label('Image 5')
                                ->image()
                                ->imageEditor()
                                ->maxSize(1024)
                                ->directory('public')
                                ->disabled($this->disableForm)
                                ->getUploadedFileNameForStorageUsing(fn ($file) => uniqid().$file->hashName())
                                ->openable()
                                ->downloadable(),
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
