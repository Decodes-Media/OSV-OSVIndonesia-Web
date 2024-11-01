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
        'fullname',
        'phone',
        'country',
        'company_name',
        'company_email',
        'message',
        'internal_note',
        'metadata',
    ];

    protected $casts = [
        'metadata' => 'json',
    ];

    public static function store($data) {
        Contact::create($data);
    }
}
