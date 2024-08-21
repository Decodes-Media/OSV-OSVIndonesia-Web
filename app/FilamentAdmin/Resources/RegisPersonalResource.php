<?php

namespace App\FilamentAdmin\Resources;

use App\Filament\MyColumns;
use App\Filament\MyFilters;
use App\Filament\MyForms;
use App\FilamentAdmin\Resources\RegisPersonalResource\Pages;
use App\Models\RegisPersonal;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class RegisPersonalResource extends Resource
{
    protected static ?string $model = RegisPersonal::class;

    protected static ?string $slug = 'regis-personals';

    protected static ?string $navigationIcon = 'heroicon-o-user';

    protected static ?int $navigationSort = 2;

    public static function getNavigationGroup(): ?string
    {
        return __('Membership');
    }

    public static function getModelLabel(): string
    {
        return __('Regis Personal');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Regis Personals');
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
                Forms\Components\TextInput::make('occupancy')
                    ->label('Pekerjaan')
                    ->columnSpanFull()
                    ->disabled(),
                Forms\Components\TextInput::make('affiliation')
                    ->label('Afiliasi/Partai Politik')
                    ->disabled(),
                Forms\Components\TextInput::make('dapil_dprd')
                    ->label('Dapil DPRD')
                    ->disabled(),
                Forms\Components\Textarea::make('question_1')
                    ->label('Alasan mencalonkan diri tingkat legislatif?')
                    ->columnSpanFull()
                    ->rows(5)
                    ->disabled(),
                Forms\Components\Textarea::make('question_2')
                    ->label('Fokus isu yang dibawakan?')
                    ->columnSpanFull()
                    ->rows(3)
                    ->disabled(),
                Forms\Components\Textarea::make('question_3')
                    ->label('Kebijakan/program yang ingin diterapkan')
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
                    ->label('Nama')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('email')
                    ->label('Email')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('phone')
                    ->label('No. Telepon')
                    ->hidden()
                    ->searchable()
                    ->sortable()
                    ->hidden(true),
                Tables\Columns\TextColumn::make('affiliation')
                    ->label('Afiliasi/Parpol')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('question_1')
                    ->label('Alasan Bergabung')
                    ->searchable()
                    ->sortable()
                    ->limit(256)
                    ->wrap()
                    ->state(function (RegisPersonal $response) {
                        return ucfirst($response->affiliation);
                    }),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('affiliation')
                    ->label('Afiliasi/Parpol')
                    ->options(array_mirror(
                        RegisPersonal::query()
                            ->selectRaw('distinct affiliation as x')
                            ->pluck('x')
                    ))->multiple(),
                MyFilters\DateRangeBasicFilter::make('created_at', 'Tgl Dibuat dari', 'Tgl Dibuat sampai'),
            ])
            ->actions([
                Tables\Actions\ViewAction::make()->label('')->icon(''),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRegisPersonals::route('/'),
            'view' => Pages\ViewRegisPersonal::route('/{record}'),
            'edit' => Pages\EditRegisPersonal::route('/{record}/edit'),
        ];
    }
}
