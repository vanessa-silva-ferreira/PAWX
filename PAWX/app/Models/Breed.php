<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Breed extends Model
{
    use HasFactory;

    protected $fillable = [
        'species_id',
        'size_id',
        'name',
        'fur_type',
        'obs'
    ];

    public function species() : BelongsTo
    {
        return $this->belongsTo(Species::class);
    }

    public function size() : BelongsTo
    {
        return $this->belongsTo(Size::class);
    }
}
