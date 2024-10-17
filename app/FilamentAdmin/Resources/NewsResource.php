<?php

namespace App\FilamentAdmin\Resources;

use App\Filament\MyActions;
use App\Filament\MyColumns;
use App\Filament\MyForms;
use App\FilamentAdmin\Resources\NewsResource\Pages;
use App\Models\News;
use App\Settings\SiteSetting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Tables\Table;
use FilamentTiptapEditor\TiptapEditor;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class NewsResource extends PageResource
{
    protected static ?string $model = News::class;

    protected static ?string $slug = 'news';

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';

    protected static ?int $navigationSort = 3;

    protected static bool $shouldRegisterNavigation = false;

    public static function getNavigationGroup(): ?string
    {
        return __('Content');
    }

    public static function getModelLabel(): string
    {
        return __('News');
    }

    public static function getPluralModelLabel(): string
    {
        return __('News');
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
                    ->options(array_mirror(News::STATUSES))
                    ->default('Draft')
                    ->required(),
                Forms\Components\DateTimePicker::make('published_at')
                    ->label('Tgl Terbit')
                    ->native(false)
                    ->minDate(fn ($context) => $context == 'create' ? today() : null)
                    ->maxDate(today()->addYears(2))
                    ->rule(fn ($get) => Rule::requiredIf($get('status') == 'Published')),
                Forms\Components\TextInput::make('metadata.publisher_name')
                    ->label('Nama Penerbit')
                    ->columnSpanFull()
                    ->default('Redaksi')
                    ->required(),
            ]),
            Forms\Components\Section::make('Gambar Cover')->schema([
                Forms\Components\FileUpload::make('cover_path')
                    ->hiddenLabel()
                    ->image()
                    ->imageEditor()
                    ->imageCropAspectRatio('16:9')
                    ->imagePreviewHeight('320px')
                    ->maxSize(2048)
                    ->directory('uploads')
                    ->getUploadedFileNameForStorageUsing(fn ($file) => uniqid().$file->hashName())
                    ->openable()
                    ->downloadable(),
            ]),
            Forms\Components\Section::make('Konten')->schema([
                Forms\Components\TextInput::make('title')
                    ->label('Judul')
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
                TiptapEditor::make('body')
                    ->label('')
                    ->columnSpanFull()
                    ->profile('page')
                    ->disk('public')
                    ->directory('uploads')
                    ->acceptedFileTypes(['image/jpg', 'image/jpeg', 'image/png'])
                    ->maxFileSize(2048)
                    ->extraInputAttributes(['style' => 'min-height: 320px;'])
                    ->required(),
            ]),
            Forms\Components\Section::make('Metadata')->schema([
                Forms\Components\Tabs::make('metadata')->schema([
                    Forms\Components\Tabs\Tab::make('SEO')->schema([
                        Forms\Components\FileUpload::make('metadata.seo_cover_path')
                            ->label('Cover')
                            ->image()
                            ->imageEditor()
                            ->imageCropAspectRatio('16:9')
                            ->imagePreviewHeight('256px')
                            ->directory('uploads')
                            ->getUploadedFileNameForStorageUsing(fn ($file) => uniqid().$file->hashName())
                            ->downloadable()
                            ->openable()
                            ->maxSize(2048)
                            ->default(@$seo['cover_path']),
                        Forms\Components\TextInput::make('metadata.seo_author')
                            ->label('Author')
                            ->maxLength(255)
                            ->afterStateHydrated(function ($record, $component) use ($seo) {
                                $component->state(@$record->metadata['seo_author'] ?: @$seo['author']);
                            }),
                        Forms\Components\Textarea::make('metadata.seo_description')
                            ->cols(3)
                            ->label('Description')
                            ->maxLength(1024)
                            ->afterStateHydrated(function ($record, $component) use ($seo) {
                                $component->state(@$record->metadata['seo_description'] ?: @$seo['description']);
                            }),
                        Forms\Components\TagsInput::make('metadata.seo_keywords')
                            ->label('Keywords')
                            ->separator(',')
                            ->default(@$seo['keywords']),
                        // ->afterStateHydrated(function ($record, $component) use ($seo) {
                        //     $component->state(@$record->metadata['seo_keywords'] ?: @$seo['keywords']);
                        // }),
                    ]),
                ]),
            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('updated_at', 'desc')
            ->columns([
                Tables\Columns\IconColumn::make('is_published')
                    ->label('Terbit')
                    ->boolean()
                    ->trueColor('primary')
                    ->sortable(),
                Tables\Columns\ImageColumn::make('cover_path')
                    ->label('Gambar Cover')
                    ->height('60px'),
                Tables\Columns\TextColumn::make('title')
                    ->label('Judul')
                    ->limit(40)
                    ->searchable()
                    ->sortable()
                    ->wrap(),
                Tables\Columns\TextColumn::make('published_at')
                    ->label('Tgl Terbit')
                    ->date('l, d M Y')
                    ->sortable(),
                Tables\Columns\TextColumn::make('metadata.publisher_name')
                    ->label('Penerbit')
                    ->searchable(query: fn (Builder $query, string $search) => //
                        $query->orWhere('metadata->publisher_name', 'like', '%'.strtolower($search).'%'),
                    )
                    ->sortable(false),
                MyColumns\CreatedAt::make(),
                MyColumns\UpdatedAt::make(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                    ->label('')
                    ->tooltip('Lihat'),
                Tables\Actions\Action::make('view-x')
                    ->label('')
                    ->color('default')
                    ->tooltip('Kunjungi')
                    ->icon('heroicon-s-arrow-top-right-on-square')
                    ->url(fn ($record) => $record->public_url)
                    ->openUrlInNewTab(),
            ])
            ->bulkActions([
                MyActions\CancelBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListNews::route('/'),
            'create' => Pages\CreateNews::route('/create'),
            'view' => Pages\ViewNews::route('/{record}'),
            'edit' => Pages\EditNews::route('/{record}/edit'),
        ];
    }
}
