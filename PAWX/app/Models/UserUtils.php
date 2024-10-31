<?php

namespace App\Models;


use Symfony\Component\HttpFoundation\Exception\BadRequestException;


trait UserUtils {

    public static function resolveFromType(string $type, int $id): Employee|Client|Admin
    {
        switch ($type) {
            case 'admin';
                return Admin::findOrFail($id);
            case 'client';
                return Client::findOrFail($id);
            case 'employee';
                return Employee::findOrFail($id);
            default:
                throw new BadRequestException('Non specific type');
        }
    }
//        UserType::Admin => Admin::findOrFail($id)->with(self::class)->first(),
//            UserType::Employee => Employee::findOrFail($id)->with(self::class)->first(),
//            UserType::Client => Client::findOrFail($id)->with(self::class)->first(),
//            UserType::User => ,
//    }
//
//    public static function GetUserTypes() {
//        return UserType::cases();
//    }
}
