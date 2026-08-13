<?php

namespace App\DTOs\Invoices;

final class invoiceItemData
{
    public function __construct(
        public string $invoiceId,
        public string $serviceId,
        public string $serviceCategory,

        public float $unitCost,

        public int $width,
        public int $height,

        public string $measuringUnit,
        public int $quantity,
        public string $notes,

        public float $materialUnitCost,
        public string $details,

        public float $subTotal,
        public float $total
    ){}
}
