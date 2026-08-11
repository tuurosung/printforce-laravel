<?php

declare(strict_types=1);

namespace App\DTOs\Customers;

final  class CustomerLedgerData
{
    public function __construct(
        public float $totalPaid,

        public float $jobsTotal,
        public float $invoiceTotal,

        public int $jobsCount,
        public int $invoiceCount,

        public ?float $debit = null,
        public ?float $credit = null,
        public ?float $ledgerBalance = null
    ){
        $this->debit = $this->invoiceTotal + $this->jobsTotal;
        $this->credit = $totalPaid;
        $this->ledgerBalance = $this->ledgerBalance();
    }

    public function ledgerBalance()
    {
        return $this->jobsTotal + $this->invoiceTotal - $this->totalPaid;
    }

    public function debit()
    {
        return $this->jobsTotal + $this->invoiceTotal;
    }
}
