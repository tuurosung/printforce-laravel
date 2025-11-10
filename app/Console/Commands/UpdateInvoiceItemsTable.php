<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class UpdateInvoiceItemsTable extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-invoice-items-table';

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
        $this->info('Updating invoice_items table...');

        if (!Schema::hasColumn('invoice_items', 'quantity')) {
            Schema::table('invoice_items', function (Blueprint $table) {
                $table->integer('quantity');
            });
        }

        DB::table('invoice_items')->where('qty', '!=', null)->update([
            'quantity' => DB::raw('qty')
        ]);


        Schema::table('invoice_items', function (Blueprint $table) {
            $columns = [
                'job_id' => [
                    'type' => 'string',
                    'after' => 'invoice_id',
                    'nullable' => true
                ],
                'service_id' => [
                    'type' => 'string',
                    'after' => 'job_id',
                    'nullable' => true
                ],
                'service_type' => [
                    'type' => 'string',
                    'after' => 'service_id',
                    'nullable' => true
                ],
                'service_category_id' => [
                    'type' => 'string',
                    'after' => 'service_type',
                    'nullable' => true
                ],
                'width' => [
                    'type' => 'decimal',
                    'precision' => [10, 2],
                    'after' => 'unit_cost',
                    'nullable' => true,
                    'default' => 1
                ],
                'height' => [
                    'type' => 'decimal',
                    'precision' => [10, 2],
                    'after' => 'width',
                    'nullable' => true,
                    'default' => 1
                ],
                'sub_total' => [
                    'type' => 'decimal',
                    'precision' => [10, 2],
                    'after' => 'quantity',
                    'storedAs' => 'unit_cost * width * height * quantity',
                    'nullable' => false
                ],
                'measuring_unit' => [
                    'type' => 'string',
                    'after' => 'height',
                    'nullable' => true
                ],
                'material_unit_cost' => [
                    'type' => 'decimal',
                    'precision' => [10, 2],
                    'after' => 'measuring_unit',
                    'nullable' => true,
                    'default' => 0
                ],
                'material_total_cost' => [
                    'type' => 'decimal',
                    'precision' => [10, 2],
                    'after' => 'material_unit_cost',
                    'storedAs' => 'material_unit_cost * quantity',
                    'nullable' => true
                ],
                'quantity' => [
                    'type' => 'integer',
                    'after' => 'measuring_unit'
                ],
                'total' => [
                    'type' => 'decimal',
                    'precision' => [10, 2],
                    'after' => 'material_total_cost',
                    'storedAs' => '(unit_cost * width * height * quantity) + material_total_cost',
                    'nullable' => false
                ],
                'description' => [
                    'type' => 'string',
                    'after' => 'updated_at',
                    'nullable' => true
                ],
                'status' => [
                    'type' => 'string',
                    'after' => 'description',
                    'nullable' => true
                ],
            ];



            foreach ($columns as $column => $config) {

                if (!Schema::hasColumn('invoice_items', $column)) {
                    $columnDefinition = null;

                    if ($config['type'] === 'string') {

                        $columnDefinition = $table->string($column);

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
                    }


                } else {

                    $columnDefinition = null;

                    if ($config['type'] === 'string') {

                        $columnDefinition = $table->string($column);

                    } elseif ($config['type'] === 'decimal') {

                        $columnDefinition = $table->decimal($column, ...$config['precision']);

                    } elseif ($config['type'] === 'integer') {

                        $columnDefinition = $table->integer($column);

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



            // Add timestamps if they don't exist
            if (!Schema::hasColumn('invoice_items', 'created_at') || !Schema::hasColumn('invoice_items', 'updated_at')) {
                Schema::table('invoice_items', function (Blueprint $table) {
                    $table->timestamps();
                });
            }


            // if (Schema::hasColumn('invoice_items', 'qty')) {
            //     Schema::table('invoice_items', function (Blueprint $table) {
            //         $table->renameColumn('qty', 'quantity');
            //     });
            // }


            // update existing rows to set default values for new columns if necessary
            // DB::table('invoice_items')->update([
            //     'material_unit_cost' => 0,
            //     'width' => 1,
            //     'height' => 1
            // ]);
        });

        // For example, you might want to run a migration or modify data.

        $this->info('invoice_items table updated successfully.');
    }
}
