<?php

namespace Database\Seeders;

use App\Models\Supply;
use Illuminate\Database\Seeder;

class SupplySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Supply::factory()->count(5)->create();
    }
}
