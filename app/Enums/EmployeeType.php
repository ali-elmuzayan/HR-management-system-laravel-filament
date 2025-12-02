<?php

namespace App\Enums;

enum EmployeeType: string
{
    case FULL_TIME = 'full_time';
    case PART_TIME = 'part_time';
    case CONTRACTOR = 'contractor';
    case INTERN = 'intern';
}
