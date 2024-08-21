<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegisPersonal extends Model
{
    use HasFactory;
    use HasUlids;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'occupancy',
        'affiliation',
        'dapil_dprd',
        'question_1',
        'question_2',
        'question_3',
        'internal_note',
        'metadata',
    ];

    protected $casts = [
        'metadata' => 'json',
    ];
}
