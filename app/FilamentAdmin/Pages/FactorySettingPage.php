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

/**
 * @property \Filament\Forms\ComponentContainer $form
 */
class FactorySettingPage extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $slug = 'factory/settings';

    protected static string $view = 'filament.pages.factory-settings-page';

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
                FC\Section::make('Section 1')
                    ->schema([
                        FC\FileUpload::make('sect1_thumbnail')
                            ->label('Thumbnail')
                            ->image()
                            ->imageEditor()
                            ->imageCropAspectRatio('16:9')
                            ->imagePreviewHeight('320px')
                            ->maxSize(2048)
                            ->directory('public')
                            ->disabled($this->disableForm)
                            ->required()
                            ->getUploadedFileNameForStorageUsing(fn ($file) => uniqid().$file->hashName())
                            ->openable()
                            ->downloadable(),
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
                            ->disabled($this->disableForm)
                            ->required()
                            ->afterStateHydrated(function ($set, $livewire) {
                                $set('sect1_desc', $livewire->data['sect1_desc']);
                            }),
                    ]),
                FC\Section::make('Section 2')
                        ->schema([
                            FC\FileUpload::make('sect2_thumbnail')
                                ->label('Thumbnail')
                                ->image()
                                ->imageEditor()
                                ->imageCropAspectRatio('16:9')
                                ->imagePreviewHeight('320px')
                                ->maxSize(2048)
                                ->directory('public')
                                ->disabled($this->disableForm)
                                ->required()
                                ->getUploadedFileNameForStorageUsing(fn ($file) => uniqid().$file->hashName())
                                ->openable()
                                ->downloadable(),
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
                                ->disabled($this->disableForm)
                                ->required()
                                ->afterStateHydrated(function ($set, $livewire) {
                                    $set('sect2_desc', $livewire->data['sect2_desc']);
                                }),
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
                                    ->imageCropAspectRatio('16:9')
                                    ->imagePreviewHeight('320px')
                                    ->maxSize(2048)
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
                        ])->minItems(2)
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
                            ->maxFileSize(2048)
                            ->extraInputAttributes(['style' => 'min-height: 320px;'])
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
                                ->imageCropAspectRatio('16:9')
                                ->imagePreviewHeight('320px')
                                ->maxSize(2048)
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
                                ->imageCropAspectRatio('16:9')
                                ->imagePreviewHeight('320px')
                                ->maxSize(2048)
                                ->directory('public')
                                ->disabled($this->disableForm)
                                ->getUploadedFileNameForStorageUsing(fn ($file) => uniqid().$file->hashName())
                                ->openable()
                                ->downloadable(),
                            // FC\FileUpload::make('cert_image3')
                            //     ->label('Image 3')
                            //     ->image()
                            //     ->imageEditor()
                            //     ->imageCropAspectRatio('16:9')
                            //     ->imagePreviewHeight('320px')
                            //     ->maxSize(2048)
                            //     ->directory('public')
                            //     ->disabled($this->disableForm)
                            //     ->getUploadedFileNameForStorageUsing(fn ($file) => uniqid().$file->hashName())
                            //     ->openable()
                            //     ->downloadable(),
                            // FC\FileUpload::make('cert_image4')
                            //     ->label('Image 4')
                            //     ->image()
                            //     ->imageEditor()
                            //     ->imageCropAspectRatio('16:9')
                            //     ->imagePreviewHeight('320px')
                            //     ->maxSize(2048)
                            //     ->directory('public')
                            //     ->disabled($this->disableForm)
                            //     ->getUploadedFileNameForStorageUsing(fn ($file) => uniqid().$file->hashName())
                            //     ->openable()
                            //     ->downloadable(),
                            // FC\FileUpload::make('cert_image5')
                            //     ->label('Image 5')
                            //     ->image()
                            //     ->imageEditor()
                            //     ->imageCropAspectRatio('16:9')
                            //     ->imagePreviewHeight('320px')
                            //     ->maxSize(2048)
                            //     ->directory('public')
                            //     ->disabled($this->disableForm)
                            //     ->getUploadedFileNameForStorageUsing(fn ($file) => uniqid().$file->hashName())
                            //     ->openable()
                            //     ->downloadable(),
                        ]),
                    ]), 
                // FC\Section::make('Foundational Beliefs Section')
                //     ->schema([
                //         FC\Grid::make(['default' => 2])->schema([
                //             FC\FileUpload::make('fb_thumbnail1')
                //                 ->label('Thumbnail 1')
                //                 ->columnSpanFull()
                //                 ->image()
                //                 ->imageEditor()
                //                 ->imageCropAspectRatio('16:9')
                //                 ->imagePreviewHeight('320px')
                //                 ->maxSize(2048)
                //                 ->directory('public')
                //                 ->getUploadedFileNameForStorageUsing(fn ($file) => uniqid().$file->hashName())
                //                 ->openable()
                //                 ->downloadable(),
                //             FC\TextInput::make('fb_title1')
                //                 ->label('Title 1')
                //                 ->disabled($this->disableForm)
                //                 ->required()
                //                 ->afterStateHydrated(function ($set, $livewire) {
                //                     $set('fb_title1', $livewire->data['fb_title1']);
                //                 }),
                //             FC\TextInput::make('fb_desc1')
                //                 ->label('Description 1')
                //                 ->disabled($this->disableForm)
                //                 ->required()
                //                 ->afterStateHydrated(function ($set, $livewire) {
                //                     $set('fb_desc1', $livewire->data['fb_desc1']);
                //                 }),
                //             FC\FileUpload::make('fb_thumbnail2')
                //                 ->label('Thumbnail 2')
                //                 ->columnSpanFull()
                //                 ->image()
                //                 ->imageEditor()
                //                 ->imageCropAspectRatio('16:9')
                //                 ->imagePreviewHeight('320px')
                //                 ->maxSize(2048)
                //                 ->directory('public')
                //                 ->getUploadedFileNameForStorageUsing(fn ($file) => uniqid().$file->hashName())
                //                 ->openable()
                //                 ->downloadable(),
                //             FC\TextInput::make('fb_title2')
                //                 ->label('Title 2')
                //                 ->disabled($this->disableForm)
                //                 ->required()
                //                 ->afterStateHydrated(function ($set, $livewire) {
                //                     $set('fb_title2', $livewire->data['fb_title2']);
                //                 }),
                //             FC\TextInput::make('fb_desc2')
                //                 ->label('Description 2')
                //                 ->disabled($this->disableForm)
                //                 ->required()
                //                 ->afterStateHydrated(function ($set, $livewire) {
                //                     $set('fb_desc2', $livewire->data['fb_desc2']);
                //                 }),
                //             FC\FileUpload::make('fb_thumbnail3')
                //                 ->label('Thumbnail 3')
                //                 ->columnSpanFull()
                //                 ->image()
                //                 ->imageEditor()
                //                 ->imageCropAspectRatio('16:9')
                //                 ->imagePreviewHeight('320px')
                //                 ->maxSize(2048)
                //                 ->directory('public')
                //                 ->getUploadedFileNameForStorageUsing(fn ($file) => uniqid().$file->hashName())
                //                 ->openable()
                //                 ->downloadable(),
                //             FC\TextInput::make('fb_title3')
                //                 ->label('Title 3')
                //                 ->disabled($this->disableForm)
                //                 ->required()
                //                 ->afterStateHydrated(function ($set, $livewire) {
                //                     $set('fb_title3', $livewire->data['fb_title3']);
                //                 }),
                //             FC\TextInput::make('fb_desc3')
                //                 ->label('Description 3')
                //                 ->disabled($this->disableForm)
                //                 ->required()
                //                 ->afterStateHydrated(function ($set, $livewire) {
                //                     $set('fb_desc3', $livewire->data['fb_desc3']);
                //                 }), 
                //             FC\FileUpload::make('fb_thumbnail4')
                //                 ->label('Thumbnail 4')
                //                 ->columnSpanFull()
                //                 ->image()
                //                 ->imageEditor()
                //                 ->imageCropAspectRatio('16:9')
                //                 ->imagePreviewHeight('320px')
                //                 ->maxSize(2048)
                //                 ->directory('public')
                //                 ->getUploadedFileNameForStorageUsing(fn ($file) => uniqid().$file->hashName())
                //                 ->openable()
                //                 ->downloadable(),
                //             FC\TextInput::make('fb_title4')
                //                 ->label('Title 4')
                //                 ->disabled($this->disableForm)
                //                 ->required()
                //                 ->afterStateHydrated(function ($set, $livewire) {
                //                     $set('fb_title4', $livewire->data['fb_title4']);
                //                 }),
                //             FC\TextInput::make('fb_desc4')
                //                 ->label('Description 4')
                //                 ->disabled($this->disableForm)
                //                 ->required()
                //                 ->afterStateHydrated(function ($set, $livewire) {
                //                     $set('fb_desc4', $livewire->data['fb_desc4']);
                //                 }),
                //         ]),
                //     ]),
                // FC\Section::make('Section 1')
                //     ->schema([
                //         FC\FileUpload::make('sect1_thumbnail')
                //             ->label('Thumbnail')
                //             ->image()
                //             ->imageEditor()
                //             ->imageCropAspectRatio('16:9')
                //             ->imagePreviewHeight('320px')
                //             ->maxSize(2048)
                //             ->directory('public')
                //             ->getUploadedFileNameForStorageUsing(fn ($file) => uniqid().$file->hashName())
                //             ->openable()
                //             ->downloadable(),
                //         FC\TextInput::make('sect1_title')
                //             ->label('Title')
                //             ->columnSpanFull()
                //             ->disabled($this->disableForm)
                //             ->required()
                //             ->afterStateHydrated(function ($set, $livewire) {
                //                 $set('sect1_title', $livewire->data['sect1_title']);
                //             }),
                //         TiptapEditor::make('sect1_desc')
                //             ->label('Description')
                //             ->columnSpanFull()
                //             ->disk('public')
                //             ->directory('uploads')
                //             ->acceptedFileTypes(['image/jpg', 'image/jpeg', 'image/png'])
                //             ->maxFileSize(2048)
                //             ->extraInputAttributes(['style' => 'min-height: 320px;'])
                //             ->required()
                //             ->afterStateHydrated(function ($set, $livewire) {
                //                 $set('sect1_desc', $livewire->data['sect1_desc']);
                //             }),
                //     ]),
                //     FC\Section::make('Section 2')
                //         ->schema([
                //             FC\FileUpload::make('sect2_thumbnail')
                //                 ->label('Thumbnail')
                //                 ->image()
                //                 ->imageEditor()
                //                 ->imageCropAspectRatio('16:9')
                //                 ->imagePreviewHeight('320px')
                //                 ->maxSize(2048)
                //                 ->directory('public')
                //                 ->getUploadedFileNameForStorageUsing(fn ($file) => uniqid().$file->hashName())
                //                 ->openable()
                //                 ->downloadable(),
                //             FC\TextInput::make('sect2_title')
                //                 ->label('Title')
                //                 ->columnSpanFull()
                //                 ->disabled($this->disableForm)
                //                 ->required()
                //                 ->afterStateHydrated(function ($set, $livewire) {
                //                     $set('sect2_title', $livewire->data['sect2_title']);
                //                 }),
                //             TiptapEditor::make('sect2_desc')
                //                 ->label('Description')
                //                 ->columnSpanFull()
                //                 ->disk('public')
                //                 ->directory('uploads')
                //                 ->acceptedFileTypes(['image/jpg', 'image/jpeg', 'image/png'])
                //                 ->maxFileSize(2048)
                //                 ->extraInputAttributes(['style' => 'min-height: 320px;'])
                //                 ->required()
                //                 ->afterStateHydrated(function ($set, $livewire) {
                //                     $set('sect2_desc', $livewire->data['sect2_desc']);
                //                 }),
                    // ]), 
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