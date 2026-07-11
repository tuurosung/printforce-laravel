<?php

declare(strict_types= 1);

namespace App\DTOs\Jobs;

use App\Enums\Jobs\JobStatusEnum;
use App\Enums\Jobs\JobTypeEnum;
use Carbon\CarbonImmutable;
use Illuminate\Support\Str;

final readonly class PrintForceJobData
{
    private function __construct(
        public ?string $subscriberId,
        public string $jobUuid,
        public JobTypeEnum $jobType,

        public ?string $jobId,
        public string $customerId,
        public ?string $serviceId,

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

        public JobStatusEnum $jobStatus,
        public ?string $jobAssignedTo,
        public ?CarbonImmutable $jobAssignedAt,
        public ?CarbonImmutable $jobCompletedAt,
        public ?string $jobCompletedBy,

        public CarbonImmutable $date,
        public ?string $notes,

        public CarbonImmutable $createdAt,
        public CarbonImmutable $updatedAt,
        public ?CarbonImmutable $deletedAt,
    ) {}


    public static function fromLegacyRow(object $row, JobTypeEnum $type): self
    {
        return new self(
            subscriberId: $row->subscriber_id,
            jobUuid: (string) Str::uuid(),
            jobType: $type,

            jobId: $row->job_id,
            customerId: $row->customer_id,
            serviceId: $row->service_id ?? null,

            unitCost: $type->isNotCost() ? (float) $row->unit_cost :  (float) $row->cost,
            qty: $type->isCopies() ?  (int) $row->copies : (int) $row->qty,
            subTotal: (float) ($row->sub_total ?? 0),
            premium: (float) ($row->premium ?? 0),
            discount: (float) ($row->discount ?? 0),
            total: (float) $row->total,

            width: $type->dimensional() ? (int) ($row->width ?? 0) : null,
            height: $type->dimensional() ? (int) ($row->height ?? 0) : null,

            matSupply: $type->hasMaterials() ? (bool) $row->mat_supply : null,
            matUnitCost: $type->hasMaterials() ? (int) $row->mat_unit_cost : null,

            jobStatus: JobStatusEnum::from($row->job_status ?? 'pending'),
            jobAssignedTo: ($row->job_assigned_to ?? null),
            jobAssignedAt: self::toImmutable($row->job_assigned_at),
            jobCompletedAt: self::toImmutable($row->job_completed_at),
            jobCompletedBy: $row->job_completed_by,

            date: CarbonImmutable::parse($row->date),
            notes: ($row->notes ?? null),

            createdAt: CarbonImmutable::parse($row->created_at),
            updatedAt: CarbonImmutable::parse($row->updated_at),
            deletedAt: self::toImmutable($row->deleted_at ?? null),
        );
    }


    public function toInsertRow(): array
    {
        return [
            'subscriber_id'    => $this->subscriberId,
            'job_uuid'         => $this->jobUuid,
            'job_type'         => $this->jobType->value,
            'job_id'           => $this->jobId,
            'customer_id'      => $this->customerId,
            'service_id'       => $this->serviceId,
            'unit_cost'        => $this->unitCost,
            'qty'              => $this->qty,
            'sub_total'        => $this->subTotal,
            'premium'          => $this->premium,
            'discount'         => $this->discount,
            'total'            => $this->total,
            'width'            => $this->width,
            'height'           => $this->height,
            'mat_supply'       => $this->matSupply,
            'mat_unit_cost'    => $this->matUnitCost,
            'job_status'       => $this->jobStatus->value,
            'job_assigned_to'  => $this->jobAssignedTo,
            'job_assigned_at'  => $this->jobAssignedAt,
            'job_completed_at' => $this->jobCompletedAt,
            'job_completed_by' => $this->jobCompletedBy,
            'date'             => $this->date,
            'notes'            => $this->notes,
            'created_at'       => $this->createdAt,
            'updated_at'       => $this->updatedAt,
            'deleted_at'       => $this->deletedAt,
        ];
    }


    private static function toImmutable(?string $value): ?CarbonImmutable
    {
        return $value === null ? null : CarbonImmutable::parse($value);
    }
}
