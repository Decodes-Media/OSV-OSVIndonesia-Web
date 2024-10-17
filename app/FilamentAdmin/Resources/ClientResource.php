<?php

namespace App\FilamentAdmin\Resources;

use App\FilamentAdmin\Resources\ClientResource\Pages;
use App\Models\Client;
use Filament\Forms\Components as FC;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns as TC;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ClientResource extends Resource
{
    protected static ?string $model = Client::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                FC\FileUpload::make('logo_path')
                    ->label('Logo')
                    ->columnSpanFull()
                    ->image()
                    ->imageEditor()
                    ->imageCropAspectRatio('1:1')
                    ->imagePreviewHeight('320px')
                    ->maxSize(2048)
                    ->directory('public')
                    ->required()
                    ->getUploadedFileNameForStorageUsing(fn ($file) => uniqid().$file->hashName())
                    ->openable()
                    ->downloadable(),
                FC\TextInput::make('name')
                    ->columnSpanFull()
                    ->label('Name')
                    ->required()
                    ->afterStateHydrated(function ($set, $livewire) {
                        $set('name', $livewire->data['name']);
                    }),
                FC\TextInput::make('order')
                    ->columnSpanFull()
                    ->numeric()
                    ->label('Order')
                    ->required()
                    ->afterStateHydrated(function ($set, $livewire) {
                        $set('order', $livewire->data['order']);
                    }),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TC\ImageColumn::make('logo_path')->label('Logo'),
                TC\TextColumn::make('name'),
                TC\TextColumn::make('order'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListClients::route('/'),
            'create' => Pages\CreateClient::route('/create'),
            'edit' => Pages\EditClient::route('/{record}/edit'),
        ];
    }
}
