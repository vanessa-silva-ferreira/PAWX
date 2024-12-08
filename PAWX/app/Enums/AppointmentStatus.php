<?php

namespace App\Enums;

enum AppointmentStatus : string
{
    case PENDING = 'Pendente';
    case CONFIRMED = 'Confirmada';
    case COMPLETED = 'Completada';
    case CANCELLED = 'Cancelada';
    case NO_SHOW = 'Faltou';
}
