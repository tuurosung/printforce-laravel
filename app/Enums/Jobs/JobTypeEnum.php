<?php

namespace App\Enums\Jobs;

enum JobTypeEnum: string
{
    case LargeFormat = "large_format";
    case Embroidery = "embroidery";
    case Press = "press";
    case Design = "design";
    case Photography = "photography";
    case Others = "others";


    public function jobTable()
    {
        return match ($this) {
            self::LargeFormat => "jobs_largeformat",
            self::Embroidery => "jobs_embroidery",
            self::Press => "jobs_press",
            self::Design => "jobs_design",
            self::Photography => "jobs_photography",
            self::Others => "jobs_other",
        };
    }


    public function jobCode(): string
    {
        return match ($this) {
            self::LargeFormat => "001",
            self::Design => "002",
            self::Embroidery => "003",
            self::Press => "004",
            self::Photography => "005",
            self::Others => "006"
        };
    }

    public static function fromCode(string $code)
    {
        return match($code) {
            "001" => self::LargeFormat,
            "002" => self::Design,
            "003" => self::Embroidery,
            "004" => self::Press,
            "005" => self::Photography,
            "006" => self::Others
        };
    }

    public function label(): string
    {
        return match ($this) {
            self::LargeFormat => "Large Format Jobs",
            self::Design => "Design Jobs",
            self::Embroidery => "Embroidery Jobs",
            self::Press => "Press Jobs",
            self::Photography => "Photography Jobs",
            self::Others => "Other Jobs",
        };
    }


    public function dimensional(): bool
    {
        return match ($this) {
            self::LargeFormat, self::Press => true,
            default => false,
        };
    }

    public function hasMaterials(): bool
    {
        return $this === self::Embroidery;
    }

    public function isNotCost(): bool
    {
        return match ($this) {
            self::Embroidery => true,
            self::Design => true,
            self::Photography => true,
            default => false,
        };
    }

    public function isCopies(): bool
    {
        return match ($this) {
            self::LargeFormat => true,
            self::Design => true,
            self::Photography => true,
            self::Press => true,
            default => false,
        };
    }
}
