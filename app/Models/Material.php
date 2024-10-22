<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasUlids, SoftDeletes;

    protected $table = "materials";

    protected $fillable = [
        'name',
        'image_path',
    ];
}
