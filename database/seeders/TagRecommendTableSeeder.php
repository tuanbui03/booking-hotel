<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TagRecommend;

class TagRecommendTableSeeder extends Seeder
{
    public function run()
    {
        TagRecommend::factory()->count(10)->create();
    }
}
