<?php

namespace App\Models;

use App\Models\User;
use App\Models\Event;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Room extends Model
{
    /** @use HasFactory<\Database\Factories\RoomFactory> */
    use HasFactory;
    protected $fillable = [
        'admin_id',
        'name',
        'slug',
        'building_id',
        'campus_id',
        'floor',
        'area',
        'capacity',
        'description',
        'category',
        'images_path',
        'documents_path'
    ];
    protected $casts = [
        'images_path' => 'array',
        'documents_path' => 'array'
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
    public function building(): BelongsTo {
        return $this->belongsTo(Building::class, 'building_id');
    }
    public function event(): HasMany {
        return $this->hasMany(Event::class, 'room_id');
    }
}
