<?php

namespace App\FilamentAdmin\Components;

use App\Models\SiteBackup;
use App\Support\SiteBackupHelper;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Spatie\Backup\BackupDestination\Backup;
use Spatie\Backup\BackupDestination\BackupDestination as SpatieBackupDestination;

class SiteBackupListRecords extends Component implements HasForms, HasTable
{
    use InteractsWithForms;
    use InteractsWithTable;

    public function render(): View
    {
        return view('filament.components.site-backup-list');
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(SiteBackup::query())
            ->columns([
                Tables\Columns\TextColumn::make('path')
                    ->label(__('Path'))
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('disk')
                    ->label(__('Disk'))
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('date')
                    ->label(__('Date'))
                    ->dateTime()
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('size')
                    ->label(__('Size'))
                    ->badge(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('disk')
                    ->label(__('Disk'))
                    ->options(SiteBackupHelper::getFilterDisks()),
            ])
            ->actions([
                Tables\Actions\Action::make('download')
                    ->label(__('Download'))
                    ->icon('heroicon-o-folder-arrow-down')
                    ->color('primary')
                    ->action(function ($record) {
                        return Storage::disk($record->disk)->download($record->path);
                    }),
                Tables\Actions\Action::make('delete')
                    ->label(__('Delete'))
                    ->icon('heroicon-o-trash')
                    ->color('danger')
                    ->requiresConfirmation()
                    ->action(function ($record) {
                        SpatieBackupDestination::create($record->disk, config('backup.backup.name'))
                            ->backups()->first(fn (Backup $backup) => $backup->path() == $record->path)
                            ?->delete();
                    }),
            ]);
    }
}
