<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Update extends Model
{
    /** @use HasFactory<\Database\Factories\UpdateFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'admin_id',
        'table',
        'record_id',
        'old_data',
        'new_data',
        'status',
        'approved_by',
        'type',
        'reject_reason'
    ];
    protected $casts = [
        'images_path' => 'array',
        'new_data' => 'array',
        'old_data' => 'array'
    ];

    public function admin(): BelongsTo {
        return $this->belongsTo(User::class, 'admin_id');
    }

    public function approver(): BelongsTo {
        return $this->belongsTo(User::class, 'approved_by');
    }
}
