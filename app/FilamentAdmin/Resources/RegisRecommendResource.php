<?php

namespace App\FilamentAdmin\Resources;

use App\Filament\MyActions;
use App\Filament\MyColumns;
use App\Filament\MyFilters;
use App\Filament\MyForms;
use App\FilamentAdmin\Resources\RegisRecommendResource\Pages;
use App\Models\RegisRecommend;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class RegisRecommendResource extends Resource
{
    protected static ?string $model = RegisRecommend::class;

    protected static ?string $slug = 'regis-recommends';

    protected static ?string $navigationIcon = 'heroicon-o-user';

    protected static ?int $navigationSort = 3;

    public static function getNavigationGroup(): ?string
    {
        return __('Membership');
    }

    public static function getModelLabel(): string
    {
        return __('Regis Recommend');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Regis Recommends');
    }

    public static function form(Form $form): Form
    {
        return $form->schema([
            MyForms\CreatorEditorPlaceholder::make(),
            Forms\Components\Section::make()->columns(2)->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Nama Lengkap')
                    ->columnSpanFull()
                    ->disabled(),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->disabled(),
                Forms\Components\TextInput::make('phone')
                    ->label('No. Telepon')
                    ->disabled(),
                Forms\Components\TextInput::make('person')
                    ->label('Nama Lengkap Rekomendasi')
                    ->columnSpanFull()
                    ->disabled(),
                Forms\Components\TextInput::make('affiliation')
                    ->label('Afiliasi/Parpol')
                    ->columnSpanFull()
                    ->disabled(),
                Forms\Components\Textarea::make('reason')
                    ->label('Alasan merekomendasikan')
                    ->columnSpanFull()
                    ->rows(5)
                    ->disabled(),
                Forms\Components\Textarea::make('internal_note')
                    ->label('Catatan Internal')
                    ->columnSpanFull()
                    ->rows(3)
                    ->maxLength(4096),
                Forms\Components\KeyValue::make('metadata')
                    ->label('Metadata')
                    ->columnSpanFull()
                    ->visible(fn ($record) => filled($record->metadata))
                    ->disabled(),
            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->columns([
                MyColumns\CreatedAt::make()
                    ->toggleable(false, false),
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama Lengkap')
                    ->searchable()
                    ->sortable()
                    ->wrap(),
                Tables\Columns\TextColumn::make('person_name')
                    ->label('Nama Rekomendasi')
                    ->searchable()
                    ->sortable()
                    ->wrap(),
                Tables\Columns\TextColumn::make('person_affiliation')
                    ->label('Afiliasi/Parpol')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('reason')
                    ->label('Alasan')
                    ->searchable()
                    ->sortable()
                    ->limit(256)
                    ->wrap()
                    ->extraHeaderAttributes(['style' => 'width:320px']),
                MyColumns\UpdatedAt::make(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('person_affiliation')
                    ->label('Afiliasi/Parpol')
                    ->options(array_mirror(
                        RegisRecommend::query()
                            ->selectRaw('distinct person_affiliation as x')
                            ->pluck('x')
                    ))->multiple(),
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
            'index' => Pages\ListRegisRecommends::route('/'),
            'view' => Pages\ViewRegisRecommend::route('/{record}'),
            'edit' => Pages\EditRegisRecommend::route('/{record}/edit'),
        ];
    }
}
