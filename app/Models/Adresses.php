<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Adresses extends Model
{
    use HasFactory;

    protected $fillable = [
        'adress_type',
        'cep',
        'street',
        'number',
        'complement',
        'neighborhood',
        'city',
        'state',
        'citizen_id',
    ];

    public function citizen(): BelongsTo
    {
        return $this->belongsTo(Citizen::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
