<?php

namespace App\Models;

use App\Concerns\ModelDefaultActivityLogOptions;
use App\Contracts\ModelWithLogActivity;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Permission\Models\Role as Model;

class Role extends Model implements ModelWithLogActivity
{
    use HasUlids;
    use LogsActivity;
    use ModelDefaultActivityLogOptions;

    public function getIdentifiableAttribute(): string
    {
        return $this->name;
    }

    public function getLoggableAttributes(): array
    {
        return ['name', 'guard_name'];
    }
}
