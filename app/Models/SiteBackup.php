<?php

namespace App\Models;

use App\Support\SiteBackupHelper;
use Illuminate\Database\Eloquent\Model;
use Sushi\Sushi;

class SiteBackup extends Model
{
    use Sushi;

    public function getRows(): array
    {
        $data = [];

        foreach (SiteBackupHelper::getDisks() as $disk) {
            $data = array_merge($data, SiteBackupHelper::getBackupDestinationData($disk));
        }

        return $data;
    }
}
