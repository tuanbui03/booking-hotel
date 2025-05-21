<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RoomImage;

class RoomImagesTableSeeder extends Seeder
{
    public function run()
    {
        RoomImage::factory()->count(20)->create();
    }
}
