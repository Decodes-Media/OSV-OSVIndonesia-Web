<?php

namespace App\FilamentAdmin\Resources;

use App\Filament\MyActions;
use App\Filament\MyColumns;
use App\Filament\MyFilters;
use App\Filament\MyForms;
use App\FilamentAdmin\Resources\MailingListResource\Pages;
use App\Models\MailingList;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class MailingListResource extends Resource
{
    protected static ?string $model = MailingList::class;

    protected static ?string $slug = 'mailing-lists';

    protected static ?string $navigationIcon = 'heroicon-o-list-bullet';

    protected static ?int $navigationSort = 4;

    public static function getNavigationGroup(): ?string
    {
        return __('Growth');
    }

    public static function getModelLabel(): string
    {
        return __('Mailing List');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Mailing Lists');
    }

    public static function form(Form $form): Form
    {
        return $form->schema([
            MyForms\CreatorEditorPlaceholder::make(),
            Forms\Components\Section::make()->schema([
                Forms\Components\TextInput::make('email')
                    ->label('Email')
                    ->columnSpanFull(),
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
                Tables\Columns\TextColumn::make('email')
                    ->label('Email')
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
            'index' => Pages\ListMailingLists::route('/'),
            'view' => Pages\ViewMailingList::route('/{record}'),
            'edit' => Pages\EditMailingList::route('/{record}/edit'),
        ];
    }
}
