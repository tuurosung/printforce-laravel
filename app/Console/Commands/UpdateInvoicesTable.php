<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Schema;

class UpdateInvoicesTable extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-invoices-table';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Updating invoices table...');

        if (!Schema::hasTable('invoices')) {
            $this->error('Invoices table does not exist.');
            return;
        }

        if (Schema::hasColumn('invoices', 'invoice_date')) {
            Schema::table('invoices', function ($table) {
                $table->dropColumn('invoice_date');
            });
        }

        if (Schema::hasColumn('invoices', 'date_issued')) {
            Schema::table('invoices', function ($table) {
                $table->renameColumn('date_issued', 'invoice_date');
            });
        }

        Schema::table('invoices', function ($table) {


            $columns = [
                'customer_id' => [
                    'type' => 'string',
                    'after' => 'invoice_id',
                    'nullable' => false
                ],
                'invoice_type' => [
                    'type' => 'string',
                    'after' => 'customer_id',
                    'nullable' => false
                ],
                'invoice_date' => [
                    'type' => 'date',
                    'after' => 'invoice_type',
                    'nullable' => true
                ],
                'due_date' => [
                    'type' => 'date',
                    'after' => 'invoice_date',
                    'nullable' => false
                ],
                'ref' => [
                    'type' => 'string',
                    'after' => 'due_date',
                    'nullable' => true
                ],
                'description' => [
                    'type' => 'string',
                    'after' => 'ref',
                    'nullable' => true
                ],
                'sub_total' => [
                    'type' => 'decimal',
                    'precision' => [10, 2],
                    'after' => 'description',
                    'nullable' => false,
                    'default' => 0
                ],
                'nhil_percent' => [
                    'type' => 'decimal',
                    'precision' => [5, 2],
                    'after' => 'vat_amount',
                    'nullable' => true,
                    'default' => 0
                ],
                'nhil_amount' => [
                    'type' => 'decimal',
                    'precision' => [10, 2],
                    'after' => 'nhil_percent',
                    'nullable' => false,
                    'storedAs' => '(sub_total * (nhil_percent / 100))'
                ],
                'getfund_percent' => [
                    'type' => 'decimal',
                    'precision' => [5, 2],
                    'after' => 'nhil_amount',
                    'nullable' => true,
                    'default' => 0
                ],
                'getfund_amount' => [
                    'type' => 'decimal',
                    'precision' => [10, 2],
                    'after' => 'getfund_percent',
                    'nullable' => false,
                    'storedAs' => '(sub_total * (getfund_percent / 100))'
                ],
                'taxable_amount' => [
                    'type' => 'decimal',
                    'precision' => [10, 2],
                    'after' => 'getfund_amount',
                    'nullable' => false,
                    'storedAs' => 'sub_total + vat_amount + nhil_amount + getfund_amount'
                ],
               'vat_percent' => [
                    'type' => 'decimal',
                    'precision' => [5, 2],
                    'after' => 'sub_total',
                    'nullable' => true,
                    'default' => 0
                ],
                'vat_amount' => [
                    'type' => 'decimal',
                    'precision' => [10, 2],
                    'after' => 'vat_percent',
                    'nullable' => false,
                    'storedAs' => '(sub_total * (vat_percent / 100))'
                ],
                'invoice_total' => [
                    'type' => 'decimal',
                    'precision' => [10, 2],
                    'after' => 'taxable_amount',
                    'nullable' => false,
                    'storedAs' => 'taxable_amount + vat_amount'
                ],
                'created_by' => [
                    'type' => 'string',
                    'after' => 'invoice_total',
                    'nullable' => true
                ],
                'status' => [
                    'type' => 'string',
                    'after' => 'created_by',
                    'nullable' => false,
                    'default' => 'draft'
                ]
            ];

            foreach ($columns as $column => $config) {
                if (!Schema::hasColumn('invoices', $column)) {

                    $columnDefinition = null;

                    if ($config['type'] === 'string') {

                        $columnDefinition = $table->string($column);

                    } elseif ($config['type'] === 'date') {

                        $columnDefinition = $table->date($column);

                    } elseif ($config['type'] === 'decimal') {

                        $precision = $config['precision'] ?? [8, 2];
                        $columnDefinition = $table->decimal($column, ...$config['precision']);

                    }

                    if ($columnDefinition) {

                        $columnDefinition->after($config['after']);

                        if (isset($config['storedAs'])) {
                            $columnDefinition->storedAs($config['storedAs']);
                        }

                        if (isset($config['nullable'])) {
                            $columnDefinition->nullable();
                        } else {
                            $columnDefinition->nullable(false);
                        }

                    }
                } else {

                    $columnDefinition = null;

                    if ($config['type'] === 'string') {

                        $columnDefinition = $table->string($column);

                    } elseif ($config['type'] === 'date') {

                        $columnDefinition = $table->date($column);

                    } elseif ($config['type'] === 'decimal') {

                        $columnDefinition = $table->decimal($column, ...$config['precision']);

                    }

                    if ($columnDefinition) {

                        $columnDefinition->after($config['after']);

                        if (isset($config['default'])) {
                            $columnDefinition->default($config['default']);
                        }

                        if (isset($config['nullable'])) {
                            $columnDefinition->nullable();
                        } else {
                            $columnDefinition->nullable(false);
                        }

                        if (isset($config['storedAs'])) {
                            $columnDefinition->storedAs($config['storedAs']);
                        }

                        $columnDefinition->change();
                    }


                }
            }


            if (!Schema::hasColumn('invoices', 'created_at') || !Schema::hasColumn('invoices', 'updated_at')) {
                $table->timestamps();
            }

            $this->info('Invoices table updated successfully.');
        });
    }
}
