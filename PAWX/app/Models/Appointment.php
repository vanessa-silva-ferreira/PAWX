<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Appointment extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'pet_id',
        'employee_id',
        'appointment_date',
        'status',
        'total_price',
    ];

    protected $dates = ['appointment_date', 'deleted_at'];

    public function pet()
    {
        return $this->belongsTo(Pet::class);
    }

    /**
     * Relacionamento com o modelo Employee.
     */
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
