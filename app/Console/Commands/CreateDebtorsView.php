<?php

namespace App\Console\Commands;

use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

#[Signature('app:create-debtors-view')]
#[Description('Command description')]
class CreateDebtorsView extends Command
{
    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Creating Debtors View...');

        DB::statement($this->viewSQL());

        $this->info('Debtors View created successfully.');
    }


    private function viewSQL(): string
    {
        return <<<'SQL'

        CREATE OR REPLACE VIEW debtors_view AS

        SELECT * FROM (

            SELECT
                c.subscriber_id,
                c.customer_id,
                c.name,
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
                SELECT subscriber_id, customer_id, SUM(total) AS total
                FROM invoices WHERE deleted_at IS NULL
                GROUP BY subscriber_id, customer_id
            ) inv ON c.customer_id = inv.customer_id AND inv.subscriber_id = c.subscriber_id

            LEFT JOIN (
                SELECT subscriber_id, customer_id, SUM(amount_paid) AS amount_paid
                FROM payments WHERE deleted_at IS NULL
                GROUP BY subscriber_id, customer_id
            ) cp ON c.customer_id = cp.customer_id AND cp.subscriber_id = c.subscriber_id

            WHERE c.status = 'active' AND c.deleted_at IS NULL

        ) debtors
        WHERE debtors.balance > 0

        SQL;
    }
}
