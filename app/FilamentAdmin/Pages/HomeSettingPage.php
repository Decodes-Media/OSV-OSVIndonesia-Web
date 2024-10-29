<?php

namespace App\FilamentAdmin\Pages;

use App\Settings\HomeSetting;
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
class HomeSettingPage extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $slug = 'home/settings';

    protected static string $view = 'filament.pages.content-settings-page';

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static ?int $navigationSort = 1;

    protected HomeSetting $setting;

    public bool $disableForm;

    public ?array $data = [];

    public static ?string $title = 'Setting';

    public static ?string $navigationLabel = 'Setting';

    public static function getNavigationGroup(): ?string
    {
        return __('Home');
    }

    public static function shouldRegisterNavigation(): bool
    {
        return filament_user_can('system.site-setting');
    }

    public function getBreadcrumbs(): array
    {
        return [__('Home'), __('Setting')];
    }

    public function boot(): void
    {
        /** @var HomeSetting $setting */
        $setting = app(HomeSetting::class);
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
                        FC\Repeater::make('banner_data')
                            ->schema([
                                FC\FileUpload::make('banner')
                                    ->label('Banner')
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
                                FC\TextInput::make('alt')
                                    ->label('Alt')
                                    ->disabled($this->disableForm)
                                    ->required(),
                            ])->minItems(3)->addActionLabel('Add Banner Data')->addable($this->disableForm != true)->deletable($this->disableForm != true),
                        FC\TextInput::make('title')
                            ->label('Title')
                            ->disabled($this->disableForm)
                            ->required()
                            ->afterStateHydrated(function ($set, $livewire) {
                                $set('title', $livewire->data['title']);
                            }),
                        FC\Textarea::make('desc')
                            ->label('Description')
                            ->columnSpanFull()
                            ->disabled($this->disableForm)
                            ->required()
                            ->afterStateHydrated(function ($set, $livewire) {
                                $set('desc', $livewire->data['desc']);
                            }),
                        FC\FileUpload::make('video')
                            ->label('Video')
                            ->columnSpanFUll()
                            ->disabled($this->disableForm)
                            ->required()
                            ->acceptedFileTypes(['video/mp4', 'video/avi', 'video/mkv', 'video/quicktime'])
                            ->getUploadedFileNameForStorageUsing(fn ($file) => uniqid().$file->hashName())
                            ->openable()
                            ->downloadable(),
                        FC\TextInput::make('highlight_text1')
                            ->label('Highlight Text (Line 1)')
                            ->maxLength(60)
                            ->disabled($this->disableForm)
                            ->required()
                            ->afterStateHydrated(function ($set, $livewire) {
                                $set('highlight_text1', $livewire->data['highlight_text1']);
                            }),
                        FC\TextInput::make('highlight_text2')
                            ->label('Highlight Text (Line 2)')
                            ->maxLength(60)
                            ->disabled($this->disableForm)
                            ->required()
                            ->afterStateHydrated(function ($set, $livewire) {
                                $set('highlight_text2', $livewire->data['highlight_text2']);
                            }),
                        FC\TextInput::make('highlight_text3')
                            ->label('Highlight Text (Line 3)')
                            ->maxLength(60)
                            ->disabled($this->disableForm)
                            ->required()
                            ->afterStateHydrated(function ($set, $livewire) {
                                $set('highlight_text3', $livewire->data['highlight_text3']);
                            }),
                        FC\TextInput::make('highlight_text4')
                            ->label('Highlight Text (Line 4)')
                            ->maxLength(60)
                            ->disabled($this->disableForm)
                            ->required()
                            ->afterStateHydrated(function ($set, $livewire) {
                                $set('highlight_text4', $livewire->data['highlight_text4']);
                            }),
                    ]),
                FC\Section::make('Manufacturing Section')
                    ->schema([
                        FC\Grid::make(['default' => 2])->schema([
                            FC\FileUpload::make('manufacture_thumb1')
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
                            FC\TextInput::make('manufacture_title1')
                                ->label('Title 1')
                                ->disabled($this->disableForm)
                                ->required()
                                ->afterStateHydrated(function ($set, $livewire) {
                                    $set('manufacture_title1', $livewire->data['manufacture_title1']);
                                }),
                            FC\TextInput::make('manufacture_link1')
                                ->label('Link')
                                ->url()
                                ->activeUrl()
                                ->disabled($this->disableForm)
                                ->required()
                                ->afterStateHydrated(function ($set, $livewire) {
                                    $set('manufacture_link1', $livewire->data['manufacture_link1']);
                                }),
                            FC\Textarea::make('manufacture_desc1')
                                ->label('Description 1')
                                ->disabled($this->disableForm)
                                ->columnSpanFull()
                                ->required()
                                ->afterStateHydrated(function ($set, $livewire) {
                                    $set('manufacture_desc1', $livewire->data['manufacture_desc1']);
                                }),
                            FC\FileUpload::make('manufacture_thumb2')
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
                            FC\TextInput::make('manufacture_title2')
                                ->label('Title 2')
                                ->disabled($this->disableForm)
                                ->required()
                                ->afterStateHydrated(function ($set, $livewire) {
                                    $set('manufacture_title2', $livewire->data['manufacture_title2']);
                                }),
                            FC\TextInput::make('manufacture_link2')
                                ->label('Link')
                                ->url()
                                ->activeUrl()
                                ->disabled($this->disableForm)
                                ->required()
                                ->afterStateHydrated(function ($set, $livewire) {
                                    $set('manufacture_link2', $livewire->data['manufacture_link2']);
                                }),
                            FC\Textarea::make('manufacture_desc2')
                                ->label('Description 2')
                                ->columnSpanFull()
                                ->disabled($this->disableForm)
                                ->required()
                                ->afterStateHydrated(function ($set, $livewire) {
                                    $set('manufacture_desc2', $livewire->data['manufacture_desc2']);
                                }),
                            FC\FileUpload::make('manufacture_thumb3')
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
                            FC\TextInput::make('manufacture_title3')
                                ->label('Title 3')
                                ->disabled($this->disableForm)
                                ->required()
                                ->afterStateHydrated(function ($set, $livewire) {
                                    $set('manufacture_title3', $livewire->data['manufacture_title3']);
                                }),
                            FC\TextInput::make('manufacture_link3')
                                ->label('Link')
                                ->url()
                                ->activeUrl()
                                ->disabled($this->disableForm)
                                ->required()
                                ->afterStateHydrated(function ($set, $livewire) {
                                    $set('manufacture_link2', $livewire->data['manufacture_link2']);
                                }),
                            FC\Textarea::make('manufacture_desc3')
                                ->label('Description 3')
                                ->columnSpanFull()
                                ->disabled($this->disableForm)
                                ->required()
                                ->afterStateHydrated(function ($set, $livewire) {
                                    $set('manufacture_desc3', $livewire->data['manufacture_desc3']);
                                }), 
                        ]),
                    ]),
                FC\Section::make('Marquee Section')
                    ->schema([
                        FC\TextInput::make('marquee_title')
                            ->label('Text')
                            ->columnSpanFull()
                            ->disabled($this->disableForm)
                            ->required()
                            ->afterStateHydrated(function ($set, $livewire) {
                                $set('marquee_title', $livewire->data['marquee_title']);
                            }),
                        FC\TextInput::make('marquee_bg_text')
                            ->label('Background Text')
                            ->columnSpanFull()
                            ->disabled($this->disableForm)
                            ->required()
                            ->afterStateHydrated(function ($set, $livewire) {
                                $set('marquee_bg_text', $livewire->data['marquee_bg_text']);
                            }),
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
                        FC\Textarea::make('factory_desc')
                            ->label('Description')
                            ->columnSpanFull()
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
                FC\Section::make('Support Furniture Brand Section')
                    ->schema([
                        FC\Repeater::make('support_image')
                            ->schema([
                                FC\FileUpload::make('img')
                                    ->label('Image')
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
                                FC\TextInput::make('alt')
                                    ->label('Alt')
                                    ->disabled($this->disableForm)
                                    ->required(),
                        ])->minItems(3)
                        ->addActionLabel('Add Support Image')->addable($this->disableForm != true)->deletable($this->disableForm != true),
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
