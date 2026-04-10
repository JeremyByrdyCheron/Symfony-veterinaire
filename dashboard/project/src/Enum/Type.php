<?php

namespace App\Enum;

enum Type: string
{
    case EMERGENCY = 'emergency';
    case VACCINATION = 'vaccination';
    case STERILIZATION = 'sterilization';
    case CHECK = 'check';
    case IDENTIFICATION = 'identification';
    case DERMATOLOGY = 'dermatology';
    case WOUND = 'wound';
    case OTHER = 'other';
}
