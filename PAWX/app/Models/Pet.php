<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pet extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'client_id',
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
}
