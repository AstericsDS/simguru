<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Building extends Model
{
    use HasFactory;
    protected $fillable = [
        'admin_id',
        'campus_id',
        'name',
        'slug',
        'area',
        'floor',
        'description',
        'address',
        'images_path',
        'status',
    ];
    protected $casts = [
        'images_path' => 'array',
    ];
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function user(): BelongsTo {
        return $this->belongsTo(User::class, 'admin_id');
    }
    public function campus(): BelongsTo {
        return $this->belongsTo(Campus::class, 'campus_id');
    }
    public function room(): HasMany {
        return $this->hasMany(Room::class, 'building_id');
    }
}
