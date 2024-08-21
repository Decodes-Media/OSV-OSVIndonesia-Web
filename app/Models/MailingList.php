<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MailingList extends Model
{
    use HasFactory;
    use HasUlids;

    protected $fillable = [
        'email',
        'metadata',
    ];

    protected $casts = [
        'metadata' => 'json',
    ];
}
