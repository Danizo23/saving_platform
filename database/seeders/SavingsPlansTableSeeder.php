<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class SavingsPlansTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('savings_plans')->insert([
            [
                'name' => 'Mpango wa Miezi Sita',
                'duration_months' => 6,
                'min_amount' => 1000.00,
                'max_amount' => 3000000.00,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Mpango wa Mwaka Mzima',
                'duration_months' => 12,
                'min_amount' => 1000.00,
                'max_amount' => 3000000.00,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
