<?php

namespace App\FilamentAdmin\Components;

use App\Models\SiteBackupStatus;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class SiteBackupStatusListRecords extends Component implements HasForms, HasTable
{
    use InteractsWithForms;
    use InteractsWithTable;

    public function render(): View
    {
        return view('filament.components.site-backup-status-list');
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(SiteBackupStatus::query())
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label(__('Name')),
                Tables\Columns\TextColumn::make('disk')
                    ->label(__('Disk')),
                Tables\Columns\IconColumn::make('healthy')
                    ->label(__('Healthy'))
                    ->boolean()
                    ->trueColor('primary'),
                Tables\Columns\TextColumn::make('amount')
                    ->label(__('Amount')),
                Tables\Columns\TextColumn::make('newest')
                    ->label(__('Newest')),
                Tables\Columns\TextColumn::make('usedStorage')
                    ->label(__('Used Storage'))
                    ->badge(),
            ]);
    }
}
