<?php

namespace App\FilamentAdmin\Resources;

use App\Filament\MyActions;
use App\Filament\MyColumns;
use App\Filament\MyFilters;
use App\Filament\MyForms;
use App\FilamentAdmin\Resources\ProfileResource\Pages;
use App\Models\Profile;
use App\Settings\SiteSetting;
use Filament\Forms;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use FilamentTiptapEditor\TiptapEditor;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ProfileResource extends Resource
{
    protected static ?string $model = Profile::class;

    protected static ?string $slug = 'profiles';

    protected static ?string $navigationIcon = 'heroicon-o-check-badge';

    protected static ?int $navigationSort = 1;

    public static function getNavigationGroup(): ?string
    {
        return __('Membership');
    }

    public static function getModelLabel(): string
    {
        return __('Profile');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Profiles');
    }

    public static function form(Form $form): Form
    {
        /** @var array $seo */
        $seo = (array) app(SiteSetting::class)->seo_default;

        return $form->schema([
            MyForms\CreatorEditorPlaceholder::make(),
            Forms\Components\Section::make('Publikasi')->columns(2)->schema([
                Forms\Components\Hidden::make('type')
                    ->default(static::getModel()),
                Forms\Components\TextInput::make('created_by_id')
                    ->label('Penulis')
                    ->columnSpanFull()
                    ->default(filament_user()->name.' — '.filament_user()->email)
                    ->disabled()
                    ->afterStateHydrated(function ($context, $record, $component) {
                        if ($context == 'view' || $context == 'edit') {
                            $component->state($record->creator?->name.' — '.$record->creator?->email);
                        }
                    }),
                Forms\Components\Select::make('status')
                    ->label('Status')
                    ->options(array_mirror(Profile::STATUSES))
                    ->default('Draft')
                    ->required(),
                Forms\Components\DateTimePicker::make('published_at')
                    ->label('Tgl Terbit')
                    ->native(false)
                    ->minDate(fn ($context) => $context == 'create' ? today() : null)
                    ->maxDate(today()->addYears(2))
                    ->rule(fn ($get) => Rule::requiredIf($get('status') == 'Published')),
            ]),
            Forms\Components\Section::make('Foto Portrait')->schema([
                Forms\Components\FileUpload::make('photo_path')
                    ->hiddenLabel()
                    ->image()
                    ->imageEditor()
                    ->imageCropAspectRatio('16:9')
                    ->imagePreviewHeight('256px')
                    ->maxSize(2048)
                    ->directory('uploads')
                    ->getUploadedFileNameForStorageUsing(fn ($file) => uniqid().$file->hashName())
                    ->openable()
                    ->downloadable(),
            ]),
            Forms\Components\Section::make('Konten')->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Nama')
                    ->columnSpanFull()
                    ->required()
                    ->reactive()
                    ->lazy()
                    ->afterStateUpdated(function ($state, $set) {
                        $set('slug', Str::slug($state));
                        $set('seo_title', $state);
                    }),
                Forms\Components\TextInput::make('slug')
                    ->label('Slug')
                    ->unique(ignoreRecord: true)
                    ->columnSpanFull()
                    ->required(),
                Forms\Components\TextInput::make('title')
                    ->label('Jabatan')
                    ->columnSpanFull()
                    ->required(),
                Textarea::make('excerpt')
                    ->label('Kutipan Singkat')
                    ->columnSpanFull()
                    ->rows(3)
                    ->required(),
                TiptapEditor::make('content')
                    ->label('Konten Panjang')
                    ->columnSpanFull()
                    ->profile('page')
                    ->disk('public')
                    ->directory('uploads')
                    ->acceptedFileTypes(['image/jpg', 'image/jpeg', 'image/png'])
                    ->maxFileSize(2048)
                    ->extraInputAttributes(['style' => 'min-height: 320px;'])
                    ->required(),
            ]),
            // Forms\Components\Section::make('Metadata')->schema([
            //     Forms\Components\Tabs::make('metadata')->schema([
            //         Forms\Components\Tabs\Tab::make('SEO')->schema([
            //             Forms\Components\FileUpload::make('metadata.seo_cover_path')
            //                 ->label('Cover')
            //                 ->image()
            //                 ->imageEditor()
            //                 ->imageCropAspectRatio('16:9')
            //                 ->imagePreviewHeight('256px')
            //                 ->directory('uploads')
            //                 ->getUploadedFileNameForStorageUsing(fn ($file) => uniqid().$file->hashName())
            //                 ->downloadable()
            //                 ->openable()
            //                 ->maxSize(2048)
            //                 ->default(@$seo['cover_path']),
            //             Forms\Components\TextInput::make('metadata.seo_author')
            //                 ->label('Author')
            //                 ->maxLength(255)
            //                 ->afterStateHydrated(function ($record, $component) use ($seo) {
            //                     $component->state(@$record->metadata['seo_author'] ?: @$seo['author']);
            //                 }),
            //             Forms\Components\Textarea::make('metadata.seo_description')
            //                 ->cols(3)
            //                 ->label('Description')
            //                 ->maxLength(1024)
            //                 ->afterStateHydrated(function ($record, $component) use ($seo) {
            //                     $component->state(@$record->metadata['seo_description'] ?: @$seo['description']);
            //                 }),
            //             Forms\Components\TagsInput::make('metadata.seo_keywords')
            //                 ->label('Keywords')
            //                 ->separator(',')
            //                 ->afterStateHydrated(function ($record, $component) use ($seo) {
            //                     $component->state(@$record->metadata['seo_keywords'] ?: @$seo['keywords']);
            //                 }),
            //         ]),
            //     ]),
            // ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->columns([
                MyColumns\CreatedAt::make()
                    ->toggleable(false, false),
                Tables\Columns\ImageColumn::make('photo_path')
                    ->label('Foto')
                    ->height('80px'),
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('title')
                    ->label('Jabatan')
                    ->searchable()
                    ->sortable(),
                MyColumns\UpdatedAt::make(),
            ])
            ->filters([
                MyFilters\DateRangeBasicFilter::make('created_at', 'Tgl Dibuat dari', 'Tgl Dibuat sampai'),
            ])
            ->actions([
                Tables\Actions\ViewAction::make()->label('')->icon(''),
            ])
            ->bulkActions([
                MyActions\CancelBulkAction::make(),
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProfiles::route('/'),
            'create' => Pages\CreateProfile::route('/create'),
            'view' => Pages\ViewProfile::route('/{record}'),
            'edit' => Pages\EditProfile::route('/{record}/edit'),
        ];
    }
}
