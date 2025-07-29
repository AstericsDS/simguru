<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Room extends Model
{
    /** @use HasFactory<\Database\Factories\RoomFactory> */
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'building_id',
        'floor',
        'capacity',
        'description',
        'status',
    ];
    public function user(): BelongsTo {
        return $this->belongsTo(User::class, 'admin_id');
    }
    public function campus(): BelongsTo {
        return $this->belongsTo(Campus::class, 'campus_id');
    }
    public function building(): BelongsTo {
        return $this->belongsTo(Building::class, 'building_id');
    }
}
