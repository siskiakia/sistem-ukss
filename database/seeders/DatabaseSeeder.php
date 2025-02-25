<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            KategoriSeeder::class,
            RakSeeder::class,
            PengunjungSeeder::class,
            ObatSeeder::class,
            TransaksiSeeder::class,
            PeminjamanSeeder::class,
        ]);;
    }
}
