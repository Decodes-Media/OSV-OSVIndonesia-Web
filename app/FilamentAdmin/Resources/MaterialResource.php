<?php

namespace App\FilamentAdmin\Resources;

use App\FilamentAdmin\Resources\MaterialResource\Pages;
use App\FilamentAdmin\Resources\MaterialResource\RelationManagers;
use Filament\Forms\Components as FC;
use Filament\Tables\Columns as TC;
use App\Models\Material;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MaterialResource extends Resource
{
    protected static ?string $model = Material::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?int $navigationSort = 2;

    public static function getNavigationGroup(): ?string
    {
        return __('Specialities');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                FC\FileUpload::make('image_path')
                ->label('Material Image')
                ->columnSpanFull()
                ->image()
                ->imageEditor()
                ->maxSize(2048)
                ->directory('public')
                ->required()
                ->getUploadedFileNameForStorageUsing(fn ($file) => uniqid().$file->hashName())
                ->openable()
                ->downloadable(),
            FC\TextInput::make('name')
                ->columnSpanFull()
                ->label('Name')
                ->unique()
                ->required()
                ->afterStateHydrated(function ($set, $livewire) {
                    $set('name', $livewire->data['name']);
                }),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TC\ImageColumn::make('image_path')->label('Material Image'),
                TC\TextColumn::make('name'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListMaterials::route('/'),
            'create' => Pages\CreateMaterial::route('/create'),
            'edit' => Pages\EditMaterial::route('/{record}/edit'),
        ];
    }
}
