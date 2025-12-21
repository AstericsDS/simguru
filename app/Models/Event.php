<?php

namespace App\Models;

use App\Models\Room;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [
        'admin',
        'room_id',
        'event_name',
        'reserved_by',
        'start',
        'end',
        'lecturer',
        'major',
        'class_of',
        'description',
        'dtend',
        'day',
        'status',
    ];

    public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class, 'room_id');
    }

}
