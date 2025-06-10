<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PendingUpdate extends Model
{
    /** @use HasFactory<\Database\Factories\PendingUpdateFactory> */
    use HasFactory;
    public function user(): BelongsTo {
        return $this->belongsTo(User::class, 'admin_id');
    }
}
