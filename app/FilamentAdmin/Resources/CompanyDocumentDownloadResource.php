<?php

namespace App\FilamentAdmin\Resources;

use App\Filament\MyActions;
use App\Filament\MyColumns;
use App\Filament\MyFilters;
use App\Filament\MyForms;
use App\FilamentAdmin\Resources\CompanyDocumentDownloadResource\Pages;
use App\Models\CompanyDocumentDownload;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class CompanyDocumentDownloadResource extends Resource
{
    protected static ?string $model = CompanyDocumentDownload::class;

    protected static ?string $slug = 'company-document-download';

    protected static ?string $navigationIcon = 'heroicon-o-inbox-arrow-down';

    protected static ?int $navigationSort = 4;

    public static function getNavigationGroup(): ?string
    {
        return __('Contact Us');
    }

    public static function getModelLabel(): string
    {
        return __('Document Download');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Document Downloads');
    }

    public static function form(Form $form): Form
    {
        return $form->schema([
            MyForms\CreatorEditorPlaceholder::make(),
            Forms\Components\Section::make()->schema([
                Forms\Components\Grid::make(['default' => 2])->schema([
                    Forms\Components\TextInput::make('fullname')
                        ->label('Full Name')
                        ->columnSpanFull()
                        ->disabled(),
                    Forms\Components\TextInput::make('phone')
                        ->label('Phone')
                        ->disabled(),
                    Forms\Components\TextInput::make('country')
                        ->label('Country')
                        ->disabled(),
                    Forms\Components\TextInput::make('company_name')
                        ->label('Company Name')
                        ->disabled(),
                    Forms\Components\TextInput::make('company_email')
                        ->label('Company Email')
                        ->disabled(),
                    Forms\Components\Textarea::make('internal_note')
                        ->label('Internal Notes')
                        ->columnSpanFull()
                        ->rows(3),
                ])
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
                Tables\Columns\TextColumn::make('fullname')
                    ->label('Full Name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('phone')
                    ->label('Phone')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('country')
                    ->label('Country')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('company_name')
                    ->label('Company Name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('company_email')
                    ->label('Company Email')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('internal_note')
                    ->label('Internal Note')
                    ->searchable()
                    ->sortable(),
                MyColumns\UpdatedAt::make(),
            ])
            ->filters([
                // MyFilters\DateRangeBasicFilter::make('created_at', 'Tgl Dibuat dari', 'Tgl Dibuat sampai'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                // Tables\Actions\ViewAction::make()->label('')->icon(''),
            ])
            ->bulkActions([
                // MyActions\CancelBulkAction::make(),
                // Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCompanyDocumentDownloads::route('/'),
            'edit' => Pages\EditCompanyDocumentDownload::route('/{record}/edit'),
        ];
    }
}
