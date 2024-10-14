<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasUlids, SoftDeletes;

    protected $table = "clients";

    protected $fillable = [
        'name',
        'logo_path',
        'order',
    ];
}
