<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Citizen extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'social_name',
        'cpf',
        'email',
        'phone',
        'father_name',
        'mother_name',
    ];

    public function adresses(): HasMany
    {
        return $this->hasMany(Adresses::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
