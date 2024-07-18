<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jsonData = file_get_contents(storage_path('countries.json'));
        $data = json_decode($jsonData, true);
        foreach ($data as $item) {
            $arr = [
                'id' =>$item['id'],
                'name'=> $item['name']
            ];
            DB::table('countries')->insert($arr);    
        }
    }
}
