<?php

namespace App\Enums;

enum UserRole: string
{
    case ROLE_USER = 'USER';
    case ROLE_ADMIN = 'ADMIN';
}
