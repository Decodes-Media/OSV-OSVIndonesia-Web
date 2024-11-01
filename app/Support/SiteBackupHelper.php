<?php

namespace App\Support;

use Illuminate\Support\Facades\Cache;
use Spatie\Backup\BackupDestination\Backup;
use Spatie\Backup\BackupDestination\BackupDestination;
use Spatie\Backup\Helpers\Format;
use Spatie\Backup\Tasks\Monitor\BackupDestinationStatus;
use Spatie\Backup\Tasks\Monitor\BackupDestinationStatusFactory;

class SiteBackupHelper
{
    public static function getDisks(): array
    {
        return config('backup.backup.destination.disks');
    }

    public static function getDisk(): string
    {
        $defaultDisks = static::getDisks();

        return request('tableFilters.disk.value', reset($defaultDisks));
    }

    public static function getFilterDisks(): array
    {
        $result = [];

        foreach (static::getDisks() as $value) {
            $result[$value] = ucfirst($value);
        }

        return $result;
    }

    public static function getBackupDestinationData(string $disk): array
    {
        return Cache::remember('backups-'.$disk, now()->addSeconds(4), function () use ($disk) {
            //
            return BackupDestination::create($disk, config('backup.backup.name'))
                ->backups()
                ->map(fn (Backup $backup) => [
                    'disk' => $disk,
                    'path' => $backup->path(),
                    'date' => $backup->date()->format('Y-m-d H:i:s'),
                    'size' => Format::humanReadableSize($backup->sizeInBytes()),
                ])
                ->toArray();
        });
    }

    public static function getBackupDestinationStatusData(): array
    {
        return Cache::remember('backup-statuses', now()->addSeconds(4), function () {
            //
            return BackupDestinationStatusFactory::createForMonitorConfig(config('backup.monitor_backups'))
                ->map(function (BackupDestinationStatus $status, int|string $key) {
                    //
                    $backup = $status->backupDestination();

                    return [
                        'id' => $key,
                        'name' => $backup->backupName(),
                        'disk' => $backup->diskName(),
                        'reachable' => $backup->isReachable(),
                        'healthy' => $status->isHealthy(),
                        'amount' => $backup->backups()->count(),
                        'newest' => $backup->newestBackup()
                            ? $backup->newestBackup()->date()->diffForHumans()
                            : __('No backups present'),
                        'usedStorage' => Format::humanReadableSize($backup->usedStorage()),
                    ];
                })
                ->values()
                ->toArray();
        });
    }
}
