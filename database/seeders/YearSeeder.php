<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class YearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $years = [
           '2023', '2024', '2025', '2026', '2027', '2028', '2029', '2030'
        ];

        foreach ($years as $year) {
            DB::table('years')->insert([
                'year' => $year,
                'created_at' => now(),
            ]);
        }
    }
}
