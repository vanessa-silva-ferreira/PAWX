<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Photo extends Model
{
    use HasFactory;

    protected $fillable = [
        'pet_id',
        'photo_url',
        'description',
        'uploaded_at',
    ];

    public function pet() : BelongsTo
    {
        return $this->belongsTo(Pet::class);
    }
}
