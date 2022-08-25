<?php

namespace App\Models;

enum GroupPermissionType: int
{

    case ADMIN = 1;
    case USER = 2;

}
