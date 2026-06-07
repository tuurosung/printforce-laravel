<?php

namespace Database\Seeders;

use App\Models\Invoices\CustomerInvoice;
use App\Models\Invoices\CustomerInvoiceItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerInvoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CustomerInvoice::factory()
            ->count(10)
            ->has(CustomerInvoiceItem::factory()->count(5), 'customerInvoiceItems')
            ->create();
    }
}
