<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Available;

class AvailableTableSeeder extends Seeder
{
    public function run()
    {
        Available::factory()->count(30)->create();
    }
}
