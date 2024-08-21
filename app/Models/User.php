<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Concerns\ModelDefaultActivityLogOptions;
use App\Contracts\ModelWithLogActivity;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Activitylog\Traits\LogsActivity;

class User extends Authenticatable implements ModelWithLogActivity
{
    use HasApiTokens;
    use HasFactory;
    use HasUlids;
    use LogsActivity;
    use ModelDefaultActivityLogOptions;
    use Notifiable;

    protected $fillable = [
        'name',
        'email',
        'email_verified_at',
        'phone',
        'password',
        'password_updated_at',
        'remember_token',
    ];

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'password_updated_at' => 'datetime',
    ];

    public function getIdentifiableAttribute(): string
    {
        return $this->name;
    }

    public function getLoggableAttributes(): array
    {
        return array_diff($this->fillable, [
            'remember_token',
        ]);
    }

    public function getAvatarUrlAttribute(): string
    {
        return public_avatarable_url($this->avatar_path, $this->name);
    }
}
