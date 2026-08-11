<?php

namespace App\Console\Commands;

use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

#[Signature('app:create-customers-view')]
#[Description('Command description')]
class CreateCustomersView extends Command
{
    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info("Creating customers view");

        DB::statement($this->viewSQL());

        $this->info("Customer view created successfully");
    }


    private function viewSQL()
    {
        return <<<'SQL'

        CREATE OR REPLACE VIEW customers_view AS

        SELECT * FROM (

            SELECT
                c.subscriber_id,
                c.customer_id,
                c.name,
                c.category,
                COALESCE(jobs.total, 0) + COALESCE(inv.total, 0) AS debit,
                COALESCE(cp.amount_paid, 0) AS credit,
                COALESCE(jobs.total, 0) + COALESCE(inv.total, 0)  - COALESCE(cp.amount_paid, 0) AS balance

            FROM customers c

            LEFT JOIN (
                SELECT subscriber_id, customer_id, SUM(total) AS total
                FROM printforce_jobs WHERE deleted_at IS NULL
                GROUP BY subscriber_id, customer_id
            ) jobs ON c.customer_id = jobs.customer_id AND jobs.subscriber_id = c.subscriber_id

            LEFT JOIN (
                SELECT subscriber_id, customer_id, SUM(invoice_total) AS total
                FROM invoices WHERE deleted_at IS NULL AND status = 'active'
                GROUP BY subscriber_id, customer_id
            ) inv ON c.customer_id = inv.customer_id AND inv.subscriber_id = c.subscriber_id

            LEFT JOIN (
                SELECT subscriber_id, customer_id, SUM(amount_paid) AS amount_paid
                FROM payments WHERE deleted_at IS NULL
                GROUP BY subscriber_id, customer_id
            ) cp ON c.customer_id = cp.customer_id AND cp.subscriber_id = c.subscriber_id

        ) customers

        SQL;
    }
}
