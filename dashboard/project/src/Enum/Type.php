<?php
namespace App\Enum;

enum Type: string
{
    case CONSULTATION = 'consultation';
    case VACCINATION = 'vaccination';
    case SURGERY = 'surgery';
    case OTHER = 'other';

}
