<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Schema;

class UpdateJobTables extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-job-tables';

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
        $this->info('Starting job tables update...');

        $columns = [
            'job_status' => [
                'type' => 'string',
                'after' => 'notes',
                'nullable' => true,
                'default' => 'pending'
            ],
            'job_assigned_to' => [
                'type' => 'string',
                'after' => 'job_status',
                'nullable' => true
            ],
            'job_assigned_at' => [
                'type' => 'timestamp',
                'after' => 'job_assigned_to',
                'nullable' => true
            ],
            'job_completed_at' => [
                'type' => 'timestamp',
                'after' => 'job_assigned_at',
                'nullable' => true
            ],
            'job_completed_by' => [
                'type' => 'string',
                'after' => 'job_completed_at',
                'nullable' => true
            ]
        ];

        Schema::table('jobs_largeformat', function ($table) use ($columns) {



            foreach ($columns as $column => $config) {
                if (!Schema::hasColumn('jobs_largeformat', $column)) {

                    $columnDefinition = null;

                    if ($config['type'] === 'string') {
                        $columnDefinition = $table->string($column);
                    } elseif ($config['type'] === 'timestamp') {
                        $columnDefinition = $table->timestamp($column);
                    }

                    if ($columnDefinition) {

                        if (isset($config['after'])) {
                            $columnDefinition->after($config['after']);
                        }

                        if (isset($config['nullable'])) {
                            $columnDefinition->nullable();
                        } else {
                            $columnDefinition->nullable(false);
                        }

                        if (isset($config['default'])) {
                            $columnDefinition->default($config['default']);
                        }
                    }
                }
            }

        });

        Schema::table('jobs_embroidery', function ($table) use ($columns) {



            foreach ($columns as $column => $config) {
                if (!Schema::hasColumn('jobs_embroidery', $column)) {

                    $columnDefinition = null;

                    if ($config['type'] === 'string') {
                        $columnDefinition = $table->string($column);
                    } elseif ($config['type'] === 'timestamp') {
                        $columnDefinition = $table->timestamp($column);
                    }

                    if ($columnDefinition) {

                        if (isset($config['after'])) {
                            $columnDefinition->after($config['after']);
                        }

                        if (isset($config['nullable'])) {
                            $columnDefinition->nullable();
                        } else {
                            $columnDefinition->nullable(false);
                        }

                        if (isset($config['default'])) {
                            $columnDefinition->default($config['default']);
                        }
                    }
                }
            }

        });

        Schema::table('jobs_design', function ($table) use ($columns) {

            foreach ($columns as $column => $config) {
                if (!Schema::hasColumn('jobs_design', $column)) {

                    $columnDefinition = null;

                    if ($config['type'] === 'string') {
                        $columnDefinition = $table->string($column);
                    } elseif ($config['type'] === 'timestamp') {
                        $columnDefinition = $table->timestamp($column);
                    }

                    if ($columnDefinition) {

                        if (isset($config['after'])) {
                            $columnDefinition->after($config['after']);
                        }

                        if (isset($config['nullable'])) {
                            $columnDefinition->nullable();
                        } else {
                            $columnDefinition->nullable(false);
                        }

                        if (isset($config['default'])) {
                            $columnDefinition->default($config['default']);
                        }
                    }
                }
            }

        });

        Schema::table('jobs_press', function ($table) use ($columns) {

            foreach ($columns as $column => $config) {
                if (!Schema::hasColumn('jobs_press', $column)) {

                    $columnDefinition = null;

                    if ($config['type'] === 'string') {
                        $columnDefinition = $table->string($column);
                    } elseif ($config['type'] === 'timestamp') {
                        $columnDefinition = $table->timestamp($column);
                    }

                    if ($columnDefinition) {

                        if (isset($config['after'])) {
                            $columnDefinition->after($config['after']);
                        }

                        if (isset($config['nullable'])) {
                            $columnDefinition->nullable();
                        } else {
                            $columnDefinition->nullable(false);
                        }

                        if (isset($config['default'])) {
                            $columnDefinition->default($config['default']);
                        }
                    }
                }
            }

        });


        Schema::table('jobs_photography', function ($table) use ($columns) {

            foreach ($columns as $column => $config) {
                if (!Schema::hasColumn('jobs_photography', $column)) {

                    $columnDefinition = null;

                    if ($config['type'] === 'string') {
                        $columnDefinition = $table->string($column);
                    } elseif ($config['type'] === 'timestamp') {
                        $columnDefinition = $table->timestamp($column);
                    }

                    if ($columnDefinition) {

                        if (isset($config['after'])) {
                            $columnDefinition->after($config['after']);
                        }

                        if (isset($config['nullable'])) {
                            $columnDefinition->nullable();
                        } else {
                            $columnDefinition->nullable(false);
                        }

                        if (isset($config['default'])) {
                            $columnDefinition->default($config['default']);
                        }
                    }
                }
            }

        });


        $this->info('Job tables update completed successfully.');
    }
}
