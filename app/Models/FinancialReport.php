<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinancialReport extends Model
{
    use HasFactory;

    protected $fillable = [
        'appointment_id',
    ];

    public function appointment()
    {
        return $this->belongsTo(Appointment::class);
    }

    public function getProfitAttribute()
    {
        $appointment = $this->appointment;

        if ($appointment && $appointment->service) {
            $cost = $appointment->service->cost ?? 0;
            return $appointment->total_price - $cost;
        }

        return 0;
    }


    public static function generateReport($startDate, $endDate)
    {
        return self::whereBetween('date', [$startDate, $endDate])->get();
    }
}
