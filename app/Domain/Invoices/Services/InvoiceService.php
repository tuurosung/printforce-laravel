<?php

namespace App\Domain\Invoices\Services;

use App\Domain\Invoices\Contracts\InvoiceRepositoryInterface;
use App\Models\Invoices\CustomerInvoice;
use DomainException;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class InvoiceService
{

    public function __construct(
        private readonly InvoiceRepositoryInterface $invoiceRepository,
        private readonly CustomerInvoice $model
    ){}


    public function getInvoices(): Collection
    {
        return $this->invoiceRepository->allInvoices();
    }


    public function createInvoice(array $data)
    {
        $newInvoice =  $this->model->create($data);

        if (!$newInvoice) {
            throw new DomainException("Invoice not created");
        }

        $this->invoiceRepository->setActiveInvoiceSession($newInvoice);
        return $newInvoice;
    }


    public function deleteInvoice(CustomerInvoice $customerInvoice)
    {
        return DB::transaction(function () use ($customerInvoice) {

            if ($customerInvoice->hasServiceItems()) {
                $customerInvoice->invoiceItems()->delete();
            }

            $customerInvoice->delete();
        });
    }


    protected function applyCharges(int $subTotal, CustomerInvoice $invoice): int
    {
        return $subTotal;
    }



}
