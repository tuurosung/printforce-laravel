<?php

declare(strict_types = 1);

namespace App\DTOs\Jobs;

use App\Domain\PrintServices\Models\PrintService;
use App\Enums\Jobs\JobTypeEnum;
use App\Traits\ArrayableDTO;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


final readonly class NewPrintJobData
{
    use ArrayableDTO;

    public function __construct(
        public string $jobUuid,
        public JobTypeEnum $jobType,

        public string $customerId,
        public string $serviceId,

        // All monetary values
        public float $unitCost,
        public int $qty,
        public float $subTotal,
        public float $premium,
        public float $discount,
        public float $total,

        // Dimensional jobs (large format, press) only
        public ?float $width,
        public ?float $height,

        // Embroidery only
        public ?bool $matSupply,
        public ?float $matUnitCost,
        public ?float $purchaseCost,


        // public CarbonImmutable $date,
        public ?string $notes,

    ){}


    public static function fromRequest(Request $request): self
    {
        return new self(
            jobUuid: self::generateUuid(),
            jobType: self::getJobType((string) $request->string('service_id')),
            serviceId: (string) $request->string('service_id'),
            customerId: (string) $request->string('customer_id'),
            unitCost: $request->float('unit_cost'),
            qty: $request->integer('quantity'),

            discount: $request->float('discount'),
            premium: $request->float('premium'),
            subTotal: $request->float('sub_total'),
            total: $request->float('total'),

            width: $request->float('width') ?? null,
            height: $request->float('height') ?? null,

            matUnitCost: $request->float('mat_unit_cost') ?? null,
            matSupply: $request->boolean('mat_supply') ?? null,
            purchaseCost: $request->float('purchase_cost') ?? null,

            notes: (string) $request->string('notes') ?? ""
        );
    }


    private static function generateUuid()
    {
        return (string) Str::uuid();
    }


    private static function getJobType(string $serviceId)
    {
        $category_code = PrintService::where('service_id', $serviceId)->value('category_id');
        return JobTypeEnum::fromCode($category_code->value);
    }

}
