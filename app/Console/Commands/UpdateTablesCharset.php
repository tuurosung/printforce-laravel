<?php

namespace App\Console\Commands;

use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

#[Signature('app:update-tables-charset')]
#[Description('Command description')]
class UpdateTablesCharset extends Command
{
    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Update the charset of table together with columns to COLLATE utf8mb4_unicode_ci;

        $tables = [
            'jobs_largeformat',
            'jobs_embroidery',
            'jobs_design',
            'jobs_press',
            'jobs_photography',
            'jobs_other',
            'payments',
            'customers',
            'invoices'
        ];

        foreach ($tables as $table) {

            DB::statement("ALTER TABLE {$table} CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
            DB::statement("ALTER TABLE {$table} ENGINE = InnoDB");
        }
    }
}
