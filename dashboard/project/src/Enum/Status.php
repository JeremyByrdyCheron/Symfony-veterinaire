<?php

namespace App\Enum;

enum Status: string
{
    case PENDING     = 'pending';
    case ACCEPTED    = 'accepted';
    case RESCHEDULED = 'rescheduled';
    case REFUSED     = 'refused';
}
