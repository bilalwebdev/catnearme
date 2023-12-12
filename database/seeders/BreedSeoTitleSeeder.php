<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BreedSeoTitleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get all records from the 'breeds' table
        $breeds = DB::table('breeds')->get();

        // Update the 'seo_title' column with the 'title' value
        foreach ($breeds as $breed) {
            DB::table('breeds')
                ->where('id', $breed->id)
                ->update(['seo_title' => $breed->title]);
        }
    }
}
