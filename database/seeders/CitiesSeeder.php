<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jsonData = file_get_contents(storage_path('cities.json'));
        $data = json_decode($jsonData, true);
        foreach ($data as $item) {
            $arr = [
                'name'=> $item['name'],
                'state_id'=>$item['state_id']
            ];
            DB::table('cities')->insert($arr);    
        }
    }
}
