<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Room;
use App\Models\Campus;
use App\Models\Building;
use App\Models\PendingUpdate;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    // ];

    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function campus(): HasMany {
        return $this->hasMany(Campus::class, 'admin_id');
    }
    public function building(): HasMany {
        return $this->hasMany(Building::class, 'admin_id');
    }
    public function room(): HasMany {
        return $this->hasMany(Room::class, 'admin_id');
    }
    public function pendingupdate(): HasMany {
        return $this->hasMany(PendingUpdate::class, 'admin_id');
    }
    public function role(): BelongsTo {
        return $this->belongsTo(Role::class, 'role');
    }
}
