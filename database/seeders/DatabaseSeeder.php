<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $exec_begin = microtime(true);
        $this->call([
            CountrySeeder::class,
            StatesSeeder::class,
            CitiesSeeder::class
        ]);

        echo "migration time total: ", ((round((microtime(true) - $exec_begin) * 1000000) / 1000000) / 60), 'mins.', PHP_EOL;
    }
}