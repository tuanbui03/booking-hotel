<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            RolesTableSeeder::class,
            UsersTableSeeder::class,
            HotelsTableSeeder::class,
            HotelImagesTableSeeder::class,
            RoomsTableSeeder::class,
            RoomImagesTableSeeder::class,
            AvailableTableSeeder::class,
            ReviewsTableSeeder::class,
            WishlistTableSeeder::class,
            PaymentsTableSeeder::class,
        ]);
    }
}
