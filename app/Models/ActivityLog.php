<?php

namespace App\Models;

use Spatie\Activitylog\Models\Activity as Model;

class ActivityLog extends Model
{
    public function getSubjectTypeFmtAttribute(): ?string
    {
        return __(@config('base.model_names')[$this->subject_type] ?: $this->subject_type);
    }

    public function getCauserTypeFmtAttribute(): ?string
    {
        return __(@config('base.model_names')[$this->causer_type] ?: $this->causer_type);
    }
}
