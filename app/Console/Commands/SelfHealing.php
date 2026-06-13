<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SelfHealing extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:self-healing';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Automatically handle database changes without needing migrations';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Initiating Self Healing Process...');

        $healers = [
            new Healers\HealInvoiceTable($this),
            new Healers\HealInvoiceItemsTable($this),
        ];

        foreach ($healers as $healer) {
            $healer->run();
        }

        $this->info('Self Healing Process Completed.');
    }

}
