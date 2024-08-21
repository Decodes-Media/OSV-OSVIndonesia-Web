<?php

namespace App\FilamentAdmin\Resources;

use App\Filament\MyActions;
use App\Filament\MyColumns;
use App\Filament\MyFilters;
use App\Filament\MyForms;
use App\FilamentAdmin\Resources\AspirationResource\Pages;
use App\Models\Aspiration;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class AspirationResource extends Resource
{
    protected static ?string $model = Aspiration::class;

    protected static ?string $slug = 'aspirations';

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-bottom-center-text';

    protected static ?int $navigationSort = 1;

    public static function getNavigationGroup(): ?string
    {
        return __('Growth');
    }

    public static function getModelLabel(): string
    {
        return __('Aspiration');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Aspirations');
    }

    public static function form(Form $form): Form
    {
        return $form->schema([
            MyForms\CreatorEditorPlaceholder::make(),
            Forms\Components\Section::make()->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Nama')
                    ->columnSpanFull()
                    ->disabledOn('edit'),
                Forms\Components\TextInput::make('email')
                    ->label('Email')
                    ->columnSpanFull()
                    ->disabledOn('edit'),
                Forms\Components\Textarea::make('message')
                    ->label('Pesan')
                    ->columnSpanFull()
                    ->rows(3)
                    ->disabledOn('edit'),
                Forms\Components\Textarea::make('internal_note')
                    ->label('Catatan Internal')
                    ->columnSpanFull()
                    ->rows(3)
                    ->disabledOn('create'),
                Forms\Components\KeyValue::make('metadata')
                    ->label('Metadata')
                    ->columnSpanFull()
                    ->disabledOn('edit'),
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
                    ->label('Nama')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('email')
                    ->label('Email')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('message')
                    ->label('Pesan')
                    ->searchable()
                    ->sortable()
                    ->limit(256)
                    ->wrap()
                    ->extraHeaderAttributes(['style' => 'width:320px']),
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
            'index' => Pages\ListAspirations::route('/'),
            'view' => Pages\ViewAspiration::route('/{record}'),
            'edit' => Pages\EditAspiration::route('/{record}/edit'),
        ];
    }
}
