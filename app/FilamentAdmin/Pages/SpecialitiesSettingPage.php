<?php

namespace App\FilamentAdmin\Pages;

use App\Settings\SpecialitiesSetting;
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
use App\Filament\MyForms;
use App\Models\Material;

/**
 * @property \Filament\Forms\ComponentContainer $form
 */
class SpecialitiesSettingPage extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $slug = 'specialities/settings';

    protected static string $view = 'filament.pages.content-settings-page';

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static ?int $navigationSort = 1;

    protected SpecialitiesSetting $setting;

    public bool $disableForm;

    public ?array $data = [];

    public static ?string $title = 'Setting';

    public static ?string $navigationLabel = 'Setting';

    public static function getNavigationGroup(): ?string
    {
        return __('Specialities');
    }

    public static function shouldRegisterNavigation(): bool
    {
        return filament_user_can('system.site-setting');
    }

    public function getBreadcrumbs(): array
    {
        return [__('Specialities'), __('Setting')];
    }

    public function boot(): void
    {
        /** @var SpecialitiesSetting $setting */
        $setting = app(SpecialitiesSetting::class);
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
                FC\Section::make('Project Section')
                    ->schema([
                        FC\Grid::make(['default' => 2])->schema([
                            FC\TextInput::make('project_title')
                                ->label('Project Title')
                                ->columnSpanFull()
                                ->disabled($this->disableForm)
                                ->required()
                                ->afterStateHydrated(function ($set, $livewire) {
                                    $set('project_title', $livewire->data['project_title']);
                            }),
                            TiptapEditor::make('project_desc')
                                ->label('Project Desc')
                                ->columnSpanFull()
                                ->disk('public')
                                ->directory('uploads')
                                ->acceptedFileTypes(['image/jpg', 'image/jpeg', 'image/png'])
                                ->maxFileSize(1024)
                                ->disabled($this->disableForm)
                                ->required()
                                ->afterStateHydrated(function ($set, $livewire) {
                                    $set('project_desc', $livewire->data['project_desc']);
                                }),
                            FC\FileUpload::make('project_top_img1')
                                ->label('Project Top Image 1')
                                ->image()
                                ->imageEditor()
                                ->maxSize(1024)
                                ->directory('public')
                                ->disabled($this->disableForm)
                                ->required()
                                ->getUploadedFileNameForStorageUsing(fn ($file) => uniqid().$file->hashName())
                                ->openable()
                                ->downloadable(),
                            FC\FileUpload::make('project_top_img2')
                                ->label('Project Top Image 2')
                                ->image()
                                ->imageEditor()
                                ->maxSize(1024)
                                ->directory('public')
                                ->disabled($this->disableForm)
                                ->required()
                                ->getUploadedFileNameForStorageUsing(fn ($file) => uniqid().$file->hashName())
                                ->openable()
                                ->downloadable(),
                            FC\FileUpload::make('project_top_img3')
                                ->label('Project Top Image 3')
                                ->image()
                                ->imageEditor()
                                ->maxSize(1024)
                                ->directory('public')
                                ->disabled($this->disableForm)
                                ->required()
                                ->getUploadedFileNameForStorageUsing(fn ($file) => uniqid().$file->hashName())
                                ->openable()
                                ->downloadable(),
                            FC\FileUpload::make('project_side_img1')
                                ->label('Project Side Image 1')
                                ->image()
                                ->imageEditor()
                                ->maxSize(1024)
                                ->directory('public')
                                ->disabled($this->disableForm)
                                ->required()
                                ->getUploadedFileNameForStorageUsing(fn ($file) => uniqid().$file->hashName())
                                ->openable()
                                ->downloadable(),
                            FC\FileUpload::make('project_side_img2')
                                ->label('Project Side Image 2')
                                ->image()
                                ->imageEditor()
                                ->maxSize(1024)
                                ->directory('public')
                                ->disabled($this->disableForm)
                                ->required()
                                ->getUploadedFileNameForStorageUsing(fn ($file) => uniqid().$file->hashName())
                                ->openable()
                                ->downloadable(),
                            FC\FileUpload::make('project_side_img3')
                                ->label('Project Side Image 3')
                                ->image()
                                ->imageEditor()
                                ->maxSize(1024)
                                ->directory('public')
                                ->disabled($this->disableForm)
                                ->required()
                                ->getUploadedFileNameForStorageUsing(fn ($file) => uniqid().$file->hashName())
                                ->openable()
                                ->downloadable(),
                            FC\FileUpload::make('project_side_img4')
                                ->label('Project Side Image 4')
                                ->image()
                                ->imageEditor()
                                ->maxSize(1024)
                                ->directory('public')
                                ->disabled($this->disableForm)
                                ->required()
                                ->getUploadedFileNameForStorageUsing(fn ($file) => uniqid().$file->hashName())
                                ->openable()
                                ->downloadable(),
                            FC\FileUpload::make('project_thumbnail1')
                                ->label('Project Thumbnail 1')
                                ->image()
                                ->imageEditor()
                                ->maxSize(1024)
                                ->directory('public')
                                ->disabled($this->disableForm)
                                ->required()
                                ->getUploadedFileNameForStorageUsing(fn ($file) => uniqid().$file->hashName())
                                ->openable()
                                ->downloadable(),
                            FC\FileUpload::make('project_thumbnail2')
                                ->label('Project Thumbnail 2')
                                ->image()
                                ->imageEditor()
                                ->maxSize(1024)
                                ->directory('public')
                                ->disabled($this->disableForm)
                                ->required()
                                ->getUploadedFileNameForStorageUsing(fn ($file) => uniqid().$file->hashName())
                                ->openable()
                                ->downloadable(),
                        ]),
                    ]),
                FC\Section::make('Product Section')
                    ->schema([
                        FC\Grid::make(['default' => 2])->schema([
                            FC\TextInput::make('product_title')
                                ->label('Product Title')
                                ->columnSpanFull()
                                ->disabled($this->disableForm)
                                ->required()
                                ->afterStateHydrated(function ($set, $livewire) {
                                    $set('product_title', $livewire->data['product_title']);
                            }),
                            TiptapEditor::make('product_desc')
                                ->label('Product Desc')
                                ->columnSpanFull()
                                ->disk('public')
                                ->directory('uploads')
                                ->acceptedFileTypes(['image/jpg', 'image/jpeg', 'image/png'])
                                ->maxFileSize(1024)
                                ->disabled($this->disableForm)
                                ->required()
                                ->afterStateHydrated(function ($set, $livewire) {
                                    $set('product_desc', $livewire->data['product_desc']);
                                }),
                            FC\FileUpload::make('product_img1')
                                ->label('Product Image 1')
                                ->image()
                                ->imageEditor()
                                ->maxSize(1024)
                                ->directory('public')
                                ->disabled($this->disableForm)
                                ->required()
                                ->getUploadedFileNameForStorageUsing(fn ($file) => uniqid().$file->hashName())
                                ->openable()
                                ->downloadable(),
                            FC\FileUpload::make('product_img2')
                                ->label('Product Image 2')
                                ->image()
                                ->imageEditor()
                                ->maxSize(1024)
                                ->directory('public')
                                ->disabled($this->disableForm)
                                ->required()
                                ->getUploadedFileNameForStorageUsing(fn ($file) => uniqid().$file->hashName())
                                ->openable()
                                ->downloadable(),
                            FC\FileUpload::make('product_img3')
                                ->label('Product Image 3')
                                ->image()
                                ->imageEditor()
                                ->maxSize(1024)
                                ->directory('public')
                                ->disabled($this->disableForm)
                                ->required()
                                ->getUploadedFileNameForStorageUsing(fn ($file) => uniqid().$file->hashName())
                                ->openable()
                                ->downloadable(),
                            FC\FileUpload::make('product_img4')
                                ->label('Product Image 4')
                                ->image()
                                ->imageEditor()
                                ->maxSize(1024)
                                ->directory('public')
                                ->disabled($this->disableForm)
                                ->required()
                                ->getUploadedFileNameForStorageUsing(fn ($file) => uniqid().$file->hashName())
                                ->openable()
                                ->downloadable(),
                        ]),
                    ]),
                FC\Section::make('Manufacture Section')
                    ->schema([
                        FC\Grid::make(['default' => 2])->schema([
                            FC\TextInput::make('manufacture_title')
                                ->label('Manufacture Title')
                                ->columnSpanFull()
                                ->disabled($this->disableForm)
                                ->required()
                                ->afterStateHydrated(function ($set, $livewire) {
                                    $set('manufacture_title', $livewire->data['manufacture_title']);
                            }),
                            TiptapEditor::make('manufacture_desc')
                                ->label('Manufacture Desc')
                                ->columnSpanFull()
                                ->disk('public')
                                ->directory('uploads')
                                ->acceptedFileTypes(['image/jpg', 'image/jpeg', 'image/png'])
                                ->maxFileSize(1024)
                                ->disabled($this->disableForm)
                                ->required()
                                ->afterStateHydrated(function ($set, $livewire) {
                                    $set('manufacture_desc', $livewire->data['manufacture_desc']);
                                }),
                            FC\FileUpload::make('manufacture_img1')
                                ->label('Manufacture Image 1')
                                ->image()
                                ->imageEditor()
                                ->maxSize(1024)
                                ->directory('public')
                                ->disabled($this->disableForm)
                                ->required()
                                ->getUploadedFileNameForStorageUsing(fn ($file) => uniqid().$file->hashName())
                                ->openable()
                                ->downloadable(),
                            FC\FileUpload::make('manufacture_img2')
                                ->label('Manufacture Image 2')
                                ->image()
                                ->imageEditor()
                                ->maxSize(1024)
                                ->directory('public')
                                ->disabled($this->disableForm)
                                ->required()
                                ->getUploadedFileNameForStorageUsing(fn ($file) => uniqid().$file->hashName())
                                ->openable()
                                ->downloadable(),
                            FC\FileUpload::make('manufacture_thumbnail')
                                ->label('Manufacture Thumbnail')
                                ->image()
                                ->imageEditor()
                                ->maxSize(1024)
                                ->directory('public')
                                ->disabled($this->disableForm)
                                ->required()
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
            Actions\Action::make('tag-image')
                ->label('Image Tag')
                ->outlined()
                ->modalHeading('Image Tag')
                ->modalWidth('7xl')
                ->modalSubmitAction(false)
                ->modalCancelAction(false)
                ->mountUsing(fn ($form, $record) => $form->fill([
                    'material_tags' => $record->manufacture_metadata['material_tags_w3c_anotation'] ?? null,
                ]))
                ->form([FC\Section::make()->schema([
                    FC\Placeholder::make('material')->content(implode(', ', Material::all()->pluck('name')->toArray())),
                    MyForms\ImageTagger::make('material_tags')
                        ->hiddenLabel()
                        ->afterStateUpdated(function ($state, $record) {
                            $state = is_array($state) ? $state : json_decode($state);
                            $metadata = (array) @$record->manufacture_metadata ?? [];
                            $metadata['material_tags_w3c_anotation'] = $state;

                            $this->setting->manufacture_metadata = $metadata;
                            $this->setting->save();
                            $msg = 'Success update image tag';
                            Notification::make()->success()->title($msg)->send();
                            $this->js('window.location.reload()');
                        }),
                ])]),
            // Actions\ViewAction::make()
            //     ->label('Kunjungi')
            //     ->url(fn ($livewire) => $livewire->record->public_url)
            //     ->openUrlInNewTab(),
        ];
    }
}
