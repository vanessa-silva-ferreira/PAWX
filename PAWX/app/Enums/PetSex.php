<?php

namespace app\Enums;

enum PetSex: string
{
    case MALE = 'male';
    case FEMALE = 'female';


    public function label(): string
    {
        return match($this) {
            self::MALE => 'Macho',
            self::FEMALE => 'Fêmea',
        };
    }
}

