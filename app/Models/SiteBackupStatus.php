<?php

namespace App\Models;

use App\Support\SiteBackupHelper;
use Illuminate\Database\Eloquent\Model;
use Sushi\Sushi;

class SiteBackupStatus extends Model
{
    use Sushi;

    public function getRows(): array
    {
        return SiteBackupHelper::getBackupDestinationStatusData();
    }
}
