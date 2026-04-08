<?php
namespace App\Enum;

enum Status: string
{
    case AWAITING = 'awaiting';
    case VALIDATE = 'validate';
    case REFUSE = 'refuse';
}
