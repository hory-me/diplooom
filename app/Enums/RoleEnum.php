<?php

namespace App\Enums;

enum RoleEnum: string
{
    case USER = 'user';
    case ADMIN = 'admin';

    public static function getRoleName(RoleEnum $role)
    {
        $ar = [
            self::USER->value => 'Пользователь',
            self::ADMIN->value => 'Администратор'
        ];

        return $ar[$role->value];
    }
}
