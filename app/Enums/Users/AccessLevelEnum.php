<?php

namespace App\Enums\Users;

use App\Traits\System\EnumTrait;

enum AccessLevelEnum: string
{
    use EnumTrait;


    case ADMINISTRATOR = "administrator";
    case MANAGER = "manager";
    case RECEPTION = "reception";
    case LARGE_FORMAT_TECHNICIAN = "large_format_technician";
    case PRINT_TECHNICIAN = "print_technician";
    case GRAPHIC_DESIGNER = "graphic_designer";
    case DTF_TECHNICIAN = "dtf_technician";
    case SUBLIMATION_TECHNICIAN = "sublimation_technician";


    public function isTechnical(): bool
    {
        return match ($this) {
            self::LARGE_FORMAT_TECHNICIAN,
            self::PRINT_TECHNICIAN,
            self::GRAPHIC_DESIGNER,
            self::DTF_TECHNICIAN,
            self::SUBLIMATION_TECHNICIAN => true,
            default => false
        };
    }


    public static function technicalUsers(): array
    {
       return array_filter(self::cases(), function ($case) {
        return $case->isTechnical();
       });
    }


}
