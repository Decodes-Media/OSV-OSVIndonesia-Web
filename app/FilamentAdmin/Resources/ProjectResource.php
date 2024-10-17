<?php

namespace App\FilamentAdmin\Resources;

use App\FilamentAdmin\Resources\ProjectResource\Pages;
use App\FilamentAdmin\Resources\ProjectResource\RelationManagers;
use App\Models\Project;
use Filament\Forms;
use Filament\Forms\Components as FC;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns as TC;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?int $navigationSort = 2;

    public static function getNavigationGroup(): ?string
    {
        return __('Projects');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                FC\TextInput::make('name')
                    ->label('Name')
                    ->required(),
                FC\TextInput::make('location')
                    ->label('Location')
                    ->required(),
                FC\FileUpload::make('image1_path')
                    ->label('Image 1')
                    ->image()
                    ->imageEditor()
                    ->maxSize(1024)
                    ->directory('public')
                    ->required()
                    ->getUploadedFileNameForStorageUsing(fn ($file) => uniqid().$file->hashName())
                    ->openable()
                    ->downloadable(),
                FC\FileUpload::make('image2_path')
                    ->label('Image 2')
                    ->image()
                    ->imageEditor()
                    ->maxSize(1024)
                    ->directory('public')
                    ->required()
                    ->getUploadedFileNameForStorageUsing(fn ($file) => uniqid().$file->hashName())
                    ->openable()
                    ->downloadable(),
                FC\FileUpload::make('image3_path')
                    ->label('Image 3')
                    ->image()
                    ->imageEditor()
                    ->maxSize(1024)
                    ->directory('public')
                    ->required()
                    ->getUploadedFileNameForStorageUsing(fn ($file) => uniqid().$file->hashName())
                    ->openable()
                    ->downloadable(),
                FC\FileUpload::make('image4_path')
                    ->label('Image 4')
                    ->image()
                    ->imageEditor()
                    ->maxSize(1024)
                    ->directory('public')
                    ->getUploadedFileNameForStorageUsing(fn ($file) => uniqid().$file->hashName())
                    ->openable()
                    ->downloadable(),
                FC\FileUpload::make('image5_path')
                    ->label('Image 5')
                    ->image()
                    ->imageEditor()
                    ->maxSize(1024)
                    ->directory('public')
                    ->getUploadedFileNameForStorageUsing(fn ($file) => uniqid().$file->hashName())
                    ->openable()
                    ->downloadable(),
                FC\FileUpload::make('image6_path')
                    ->label('Image 6')
                    ->image()
                    ->imageEditor()
                    ->maxSize(1024)
                    ->directory('public')
                    ->getUploadedFileNameForStorageUsing(fn ($file) => uniqid().$file->hashName())
                    ->openable()
                    ->downloadable(),
                FC\FileUpload::make('image7_path')
                    ->label('Image 7')
                    ->image()
                    ->imageEditor()
                    ->maxSize(1024)
                    ->directory('public')
                    ->getUploadedFileNameForStorageUsing(fn ($file) => uniqid().$file->hashName())
                    ->openable()
                    ->downloadable(),
                FC\FileUpload::make('image8_path')
                    ->label('Image 8')
                    ->image()
                    ->imageEditor()
                    ->maxSize(1024)
                    ->directory('public')
                    ->getUploadedFileNameForStorageUsing(fn ($file) => uniqid().$file->hashName())
                    ->openable()
                    ->downloadable(),
                FC\FileUpload::make('image9_path')
                    ->label('Image 9')
                    ->image()
                    ->imageEditor()
                    ->maxSize(1024)
                    ->directory('public')
                    ->getUploadedFileNameForStorageUsing(fn ($file) => uniqid().$file->hashName())
                    ->openable()
                    ->downloadable(),
                FC\FileUpload::make('image10_path')
                    ->label('Image 10')
                    ->image()
                    ->imageEditor()
                    ->maxSize(1024)
                    ->directory('public')
                    ->getUploadedFileNameForStorageUsing(fn ($file) => uniqid().$file->hashName())
                    ->openable()
                    ->downloadable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TC\TextColumn::make('name'),
                TC\TextColumn::make('location'),
                TC\ImageColumn::make('image1_path')->label('Image 1'),
                TC\ImageColumn::make('image2_path')->label('Image 2'),
                TC\ImageColumn::make('image3_path')->label('Image 3'),
                TC\ImageColumn::make('image4_path')->label('Image 4'),
                TC\ImageColumn::make('image5_path')->label('Image 5'),
                TC\ImageColumn::make('image6_path')->label('Image 6'),
                TC\ImageColumn::make('image7_path')->label('Image 7'),
                TC\ImageColumn::make('image8_path')->label('Image 8'),
                TC\ImageColumn::make('image9_path')->label('Image 9'),
                TC\ImageColumn::make('image10_path')->label('Image 10'),
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
            'index' => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProject::route('/create'),
            'edit' => Pages\EditProject::route('/{record}/edit'),
        ];
    }
}
