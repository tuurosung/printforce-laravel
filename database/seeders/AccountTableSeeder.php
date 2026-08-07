<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AccountTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('all_accounts')
            ->get()
            ->each(function($account) {

                $type = DB::table('account_headers')->where('sn', $account->account_header)->value('type');

                DB::table('all_accounts')
                    ->where('sn', $account->sn)
                    ->update([
                    'account_type' => $type
                ]);

            });

        Schema::table('all_accounts', function($table){

            if (! Schema::hasColumn('all_accounts', 'account_id')) {
                $table->string('account_id')->nullable()->after('subscriber_id');
            } else {
                $table->uuid('account_id')->nullable()->after('subscriber_id')->change();
            }

        });
    }
}
