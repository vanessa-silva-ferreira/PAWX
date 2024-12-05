<?php

namespace App\Enums;

enum AppointmentStatus : string
{
    case PENDING = 'A confirmar';
    case CONFIRMED = 'Confirmada';
    case COMPLETED = 'Completa';
    case CANCELLED = 'Cancelada';
    case NO_SHOW = 'Faltou';
}
