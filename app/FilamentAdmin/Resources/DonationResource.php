<?php

namespace App\FilamentAdmin\Resources;

use App\Filament\MyActions;
use App\Filament\MyColumns;
use App\Filament\MyFilters;
use App\Filament\MyForms;
use App\FilamentAdmin\Resources\DonationResource\Pages;
use App\Models\Donation;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class DonationResource extends Resource
{
    protected static ?string $model = Donation::class;

    protected static ?string $slug = 'donations';

    protected static ?string $navigationIcon = 'heroicon-o-credit-card';

    protected static ?int $navigationSort = 2;

    public static function getNavigationGroup(): ?string
    {
        return __('Growth');
    }

    public static function getModelLabel(): string
    {
        return __('Donation');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Donations');
    }

    public static function form(Form $form): Form
    {
        return $form->schema([
            MyForms\CreatorEditorPlaceholder::make(),
            Forms\Components\Section::make()->columns(2)->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Nama Lengkap')
                    ->disabled(),
                Forms\Components\TextInput::make('orgname')
                    ->label('Nama Organisasi')
                    ->disabled(),
                Forms\Components\TextInput::make('email')
                    ->label('Email'),
                Forms\Components\TextInput::make('phone')
                    ->label('No. Telepon')
                    ->disabled(),
                Forms\Components\TextInput::make('amount')
                    ->label('Jumlah Donasi')
                    ->columnSpanFull()
                    ->disabled()
                    ->formatStateUsing(fn ($state) => rupiah($state, 2)),
                Forms\Components\FileUpload::make('proof_path')
                    ->label('Bukti Donasi')
                    ->columnSpanFull()
                    ->openable()
                    ->downloadable()
                    ->disabled(),
                Forms\Components\Textarea::make('message')
                    ->label('Pesan Donasi')
                    ->columnSpanFull()
                    ->rows(3)
                    ->disabled(),
                Forms\Components\KeyValue::make('metadata')
                    ->label('Metadata')
                    ->columnSpanFull()
                    ->visible(fn ($record) => filled($record->metadata)),
                MyForms\Toggle::make('is_published', 'Aktif — tampil di halaman depan.'),
                Forms\Components\Textarea::make('internal_note')
                    ->label('Catatan Internal')
                    ->columnSpanFull()
                    ->rows(3)
                    ->maxLength(4096),
            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->columns([
                MyColumns\CheckIcon::make('is_published', 'Publikasi'),
                MyColumns\CreatedAt::make()
                    ->toggleable(false, false),
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama Lengkap')
                    ->searchable()
                    ->sortable()
                    ->wrap(),
                Tables\Columns\TextColumn::make('orgname')
                    ->label('Organisasi')
                    ->searchable()
                    ->sortable()
                    ->wrap(),
                Tables\Columns\TextColumn::make('email')
                    ->label('Email')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('amount')
                    ->label('Jumlah')
                    ->formatStateUsing(fn ($state) => rupiah($state))
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('phone')
                    ->label('No. Telepon')
                    ->searchable()
                    ->sortable()
                    ->toggleable(true, true),
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
            'index' => Pages\ListDonations::route('/'),
            'view' => Pages\ViewDonation::route('/{record}'),
            'edit' => Pages\EditDonation::route('/{record}/edit'),
        ];
    }
}
