<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Concerns\ModelDefaultActivityLogOptions;
use App\Contracts\ModelWithLogActivity;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Permission\Traits\HasRoles;

class Admin extends Authenticatable implements FilamentUser, ModelWithLogActivity
{
    use HasApiTokens;
    use HasFactory;
    use HasRoles;
    use HasUlids;
    use LogsActivity;
    use ModelDefaultActivityLogOptions;
    use Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'password_updated_at',
        'remember_token',
        'is_active',
        'last_login_at',
    ];

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'password_updated_at' => 'datetime',
        'is_active' => 'boolean',
        'last_login_at' => 'datetime',
    ];

    public function getIdentifiableAttribute(): string
    {
        return $this->name;
    }

    public function getLoggableAttributes(): array
    {
        return array_diff($this->fillable, [
            'remember_token',
            'last_login_at',
        ]);
    }

    public function canAccessPanel(Panel $panel): bool
    {
        return $this->is_active;
    }
}
