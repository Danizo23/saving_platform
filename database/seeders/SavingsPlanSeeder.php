<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SavingsPlan;

class SavingsPlanSeeder extends Seeder
{
    public function run()
    {
        SavingsPlan::create([
            'name' => '6 Month Plan',
            'duration_months' => 6,
            'min_amount' => 5000,
            'max_amount' => 1000000,
        ]);

        SavingsPlan::create([
            'name' => '12 Month Plan',
            'duration_months' => 12,
            'min_amount' => 10000,
            'max_amount' => 5000000,
        ]);
    }
}
