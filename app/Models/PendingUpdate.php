<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PendingUpdate extends Model
{
    /** @use HasFactory<\Database\Factories\PendingUpdateFactory> */
    use HasFactory;

    protected $fillable = [
        'admin_id',
        'table',
        'record_id',
        'old_data',
        'new_data',
        'status',
        'approved_by',
        'reject_reason'
    ];
    protected $casts = [
        'images_path' => 'array',
    ];

    public function admin(): BelongsTo {
        return $this->belongsTo(User::class, 'admin_id');
    }

    public function approver(): BelongsTo {
        return $this->belongsTo(User::class, 'approved_by');
    }
}
