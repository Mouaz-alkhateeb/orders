<?php

namespace App\Statuses;

class UserType
{
    public const SUPERVISOR = 1;
    public const MANGER = 2;
    public const USER = 3;

    public static array $statuses = [self::SUPERVISOR, self::MANGER,  self::USER];
}
