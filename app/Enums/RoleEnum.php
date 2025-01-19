<?php

namespace App\Enums;

enum RoleEnum: string
{
    case System = 'system';
    case Admin = 'admin';
    case User = 'user';
    case Employee = 'employee';
}
