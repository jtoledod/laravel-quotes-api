<?php

namespace App\Enums;

enum UserStatus: int
{
    case STATUS_ACTIVE = 1;
    case STATUS_INACTIVE = 0;
}
