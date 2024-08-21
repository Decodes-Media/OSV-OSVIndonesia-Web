<?php

namespace App\Concerns;

use App\Contracts\ModelWithLogActivity;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;

trait ModelDefaultActivityLogOptions
{
    public function getActivitylogOptions(): LogOptions
    {
        /** @var Model&ModelWithLogActivity $this */
        //
        $morphName = @config('base.model_names')[get_class($this)]
                   ?: $this->getMorphClass();

        $record = trans($morphName);

        $logOnly = method_exists($this, 'getLoggableAttributes')
            ? $this->getLoggableAttributes() : $this->fillable;

        return LogOptions::defaults()
            ->useLogName('Database')
            ->logOnlyDirty()
            ->logOnly($logOnly)
            ->dontSubmitEmptyLogs()
            ->setDescriptionForEvent(function ($eventName) use ($record) {
                return match ($eventName) {
                    'created' => __('Successfully create new :record', ['record' => $record]),
                    'updated' => __('Successfully update a :record', ['record' => $record]),
                    'deleted' => __('Successfully delete a :record', ['record' => $record]),
                    'restored' => __('Successfully restore deleted :record', ['record' => $record]),
                    default => null,
                };
            });
    }
}
