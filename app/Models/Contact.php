<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    use HasUlids;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'message',
        'internal_note',
        'metadata',
    ];

    protected $casts = [
        'metadata' => 'json',
    ];
}
