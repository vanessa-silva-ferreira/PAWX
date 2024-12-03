<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pet extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'client_id',
        'size_id',
        'breed_id',
        'name',
        'birthdate',
        'gender',
        'medical_history',
        'spay_neuter_status',
        'status',
        'obs'
    ];

    public function client(){
        return $this->belongsTo(Client::class);
    }

    public function size() : BelongsTo
    {
        return $this->belongsTo(Size::class);
    }

    public function breed() : HasOne
    {
        return $this->hasOne(Breed::class, 'id', 'breed_id');
    }

    public function photos() : HasMany
    {
        return $this->hasMany(Photo::class);
    }
}
