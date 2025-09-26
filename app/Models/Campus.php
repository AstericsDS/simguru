<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Campus extends Model
{
    /** @use HasFactory<\Database\Factories\CampusFactory> */
    use HasFactory;
    protected $fillable = [
        'admin_id',
        'name',
        'slug',
        'address',
        'contact',
        'email',
        'description',
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
    public function building(): HasMany {
        return $this->hasMany(Building::class);
    }
}
