<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class DbUpgradeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // Large Format Database Checks and Fixes
        $this->upgradeLargeFormatDatabase();
        $this->upgradeEmbroideryDatabase();
    }




    /**
     * Run database upgrade checks and fixes on Large Format Table
     */
    private function upgradeLargeFormatDatabase()
    {
        if (!Schema::hasTable('jobs_largeformat')) {
            return;
        }

        //    `sn`, `subscriber_id`, `customer_id`, `job_id`, `service_id`, `cost`,
        // `width`, `height`, `measuring_unit`, `copies`, `premium`, `discount`,
        // `total`, `date`, `timestamp`, `status`, `notes`, `created_at`, `updated_at`

        Schema::table('jobs_largeformat', function ($table) {

            if (!Schema::hasColumn('jobs_largeformat', 'customer_id')) {
                $table->string('customer_id')->after('subscriber_id');
            } else {
                $table->string('customer_id')->after('subscriber_id')->change();
            }

            if (!Schema::hasColumn('jobs_largeformat', 'job_id')) {
                $table->string('job_id')->after('customer_id');
            } else {
                $table->string('job_id')->after('customer_id')->change();
            }

            if (!Schema::hasColumn('jobs_largeformat', 'service_id')) {
                $table->string('service_id')->after('job_id');
            } else {
                $table->string('service_id')->after('job_id')->change();
            }
            if (!Schema::hasColumn('jobs_largeformat', 'cost')) {
                $table->decimal('cost', 10, 2)->after('service_id');
            } else {
                $table->decimal('cost', 10, 2)->after('service_id')->change();
            }

            if (!Schema::hasColumn('jobs_largeformat', 'width')) {
                $table->decimal('width', 10, 2)->after('cost');
            } else {
                $table->decimal('width', 10, 2)->after('cost')->change();
            }

            if (!Schema::hasColumn('jobs_largeformat', 'height')) {
                $table->decimal('height', 10, 2)->after('width');
            } else {
                $table->decimal('height', 10, 2)->after('width')->change();
            }

            if (!Schema::hasColumn('jobs_largeformat', 'measuring_unit')) {
                $table->string('measuring_unit')->after('height');
            } else {
                $table->string('measuring_unit')->after('height')->change();
            }

            if (!Schema::hasColumn('jobs_largeformat', 'copies')) {
                $table->integer('copies')->after('measuring_unit');
            } else {
                $table->integer('copies')->after('measuring_unit')->change();
            }

            if (!Schema::hasColumn('jobs_largeformat', 'premium')) {
                $table->decimal('premium', 10, 2)->after('copies');
            } else {
                $table->decimal('premium', 10, 2)->after('copies')->change();
            }

            if (!Schema::hasColumn('jobs_largeformat', 'discount')) {
                $table->decimal('discount', 10, 2)->after('premium');
            } else {
                $table->decimal('discount', 10, 2)->after('premium')->change();
            }

            if (!Schema::hasColumn('jobs_largeformat', 'total')) {
                $table->decimal('total', 10, 2)->after('discount');
            } else {
                $table->decimal('total', 10, 2)->after('discount')->change();
            }

            if (!Schema::hasColumn('jobs_largeformat', 'date')) {
                $table->date('date')->useCurrent()->after('total');
            } else {
                $table->date('date')->useCurrent()->after('total')->change();
            }

            if (!Schema::hasColumn('jobs_largeformat', 'timestamp')) {
                $table->string('timestamp')->nullable()->after('date');
            } else {
                $table->string('timestamp')->nullable()->after('date')->change();
            }

            if (!Schema::hasColumn('jobs_largeformat', 'status')) {
                $table->string('status')->default('active')->after('timestamp');
            } else {
                $table->string('status')->default('active')->after('timestamp')->change();
            }

            if (!Schema::hasColumn('jobs_largeformat', 'notes')) {
                $table->text('notes')->nullable()->after('status');
            } else {
                $table->text('notes')->nullable()->after('status')->change();
            }

            if (!Schema::hasColumn('jobs_largeformat', 'created_at')) {
                $table->timestamp('created_at')->useCurrent()->after('notes');
            } else {
                $table->timestamp('created_at')->useCurrent()->after('notes')->change();
            }

            if (!Schema::hasColumn('jobs_largeformat', 'updated_at')) {
                $table->timestamp('updated_at')->nullable()->useCurrentOnUpdate()->after('created_at');
            } else {
                $table->timestamp('updated_at')->nullable()->useCurrentOnUpdate()->after('created_at')->change();
            }

        });

        // output the upgrade status
        echo "Large Format database upgrade checks and fixes completed successfully.\n";

        // add line break for better readability
        echo "\n";
    }


    private function upgradeEmbroideryDatabase()
    {
        if (!Schema::hasTable('jobs_embroidery')) {
            return;
        }


        // `sn`, `subscriber_id`, `customer_id`, `job_id`, `service_id`, `unit_cost`, `qty`, `embroidery_cost`,
        // `mat_supply`, `mat_unit_cost`, `purchase_cost`, `total`, `date`, `timestamp`, `status`, `notes`,
        // `created_at`, `updated_at`

        Schema::table('jobs_embroidery', function ($table) {

            if (!Schema::hasColumn('jobs_embroidery', 'customer_id')) {
                $table->string('customer_id')->after('subscriber_id');
            } else {
                $table->string('customer_id')->after('subscriber_id')->change();
            }

            if (!Schema::hasColumn('jobs_embroidery', 'job_id')) {
                $table->string('job_id')->after('customer_id');
            } else {
                $table->string('job_id')->after('customer_id')->change();
            }

            if (!Schema::hasColumn('jobs_embroidery', 'service_id')) {
                $table->string('service_id')->after('job_id');
            } else {
                $table->string('service_id')->after('job_id')->change();
            }

            if (!Schema::hasColumn('jobs_embroidery', 'unit_cost')) {
                $table->decimal('unit_cost', 10, 2)->after('service_id');
            } else {
                $table->decimal('unit_cost', 10, 2)->after('service_id')->change();
            }

            if (!Schema::hasColumn('jobs_embroidery', 'qty')) {
                $table->integer('qty')->after('unit_cost');
            } else {
                $table->integer('qty')->after('unit_cost')->change();
            }

            if (!Schema::hasColumn('jobs_embroidery', 'embroidery_cost')) {
                $table->decimal('embroidery_cost', 10, 2)->after('qty');
            } else {
                $table->decimal('embroidery_cost', 10, 2)->after('qty')->change();
            }

            if (!Schema::hasColumn('jobs_embroidery', 'mat_supply')) {
                $table->text('mat_supply')->after('embroidery_cost');
            } else {
                $table->text('mat_supply')->after('embroidery_cost')->change();
            }

            if (!Schema::hasColumn('jobs_embroidery', 'mat_unit_cost')) {
                $table->decimal('mat_unit_cost', 10, 2)->after('mat_supply');
            } else {
                $table->decimal('mat_unit_cost', 10, 2)->after('mat_supply')->change();
            }

            if (!Schema::hasColumn('jobs_embroidery', 'purchase_cost')) {
                $table->decimal('purchase_cost', 10, 2)->after('mat_unit_cost');
            } else {
                $table->decimal('purchase_cost', 10, 2)->after('mat_unit_cost')->change();
            }

            if (!Schema::hasColumn('jobs_embroidery', 'total')) {
                $table->decimal('total', 10, 2)->after('purchase_cost');
            } else {
                $table->decimal('total', 10, 2)->after('purchase_cost')->change();
            }

            if (!Schema::hasColumn('jobs_embroidery', 'date')) {
                $table->date('date')->useCurrent()->after('total');
            } else {
                $table->date('date')->useCurrent()->after('total')->change();
            }

            if (!Schema::hasColumn('jobs_embroidery', 'timestamp')) {
                $table->string('timestamp')->nullable()->after('date');
            } else {
                $table->string('timestamp')->nullable()->after('date')->change();
            }

            if (!Schema::hasColumn('jobs_embroidery', 'status')) {
                $table->string('status')->default('active')->after('timestamp');
            } else {
                $table->string('status')->default('active')->after('timestamp')->change();
            }

            if (!Schema::hasColumn('jobs_embroidery', 'notes')) {
                $table->text('notes')->nullable()->after('status');
            } else {
                $table->text('notes')->nullable()->after('status')->change();
            }

            if (!Schema::hasColumn('jobs_embroidery', 'created_at')) {
                $table->timestamp('created_at')->useCurrent()->after('notes');
            } else {
                $table->timestamp('created_at')->useCurrent()->after('notes')->change();
            }

            if (!Schema::hasColumn('jobs_embroidery', 'updated_at')) {
                $table->timestamp('updated_at')->nullable()->useCurrentOnUpdate()->after('created_at');
            } else {
                $table->timestamp('updated_at')->nullable()->useCurrentOnUpdate()->after('created_at')->change();
            }

      
        });

        // output the upgrade status
        echo "<br>";
        echo "Embroidery database upgrade checks and fixes completed successfully.\n";
    }


}
