<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Building extends Model
{
    use HasFactory, HasUlids;
    protected $fillable = ['campus_id', 'name', 'floor', 'description', 'images_path', 'status', 'area', 'address'];
    public function user(): BelongsTo {
        return $this->belongsTo(User::class, 'admin_id');
    }
    public function campus(): BelongsTo {
        return $this->belongsTo(Campus::class, 'campus_id');
    }
}
