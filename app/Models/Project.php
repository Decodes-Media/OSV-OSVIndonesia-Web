<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory, HasUlids;

    protected $fillable = [
        'name',
        'location',
        'image1_path',
        'image2_path',
        'image3_path',
        'image4_path',
        'image5_path',
        'image6_path',
        'image7_path',
        'image8_path',
        'image9_path',
        'image10_path'
    ];
}
