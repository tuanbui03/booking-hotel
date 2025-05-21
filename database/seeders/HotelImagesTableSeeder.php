<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\HotelImage;

class HotelImagesTableSeeder extends Seeder
{
    public function run()
    {
        HotelImage::factory()->count(15)->create();
    }
}
