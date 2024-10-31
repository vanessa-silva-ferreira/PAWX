<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Employee extends User
{
    use HasFactory;

    protected $with = ['user'];

    // eager load user

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
