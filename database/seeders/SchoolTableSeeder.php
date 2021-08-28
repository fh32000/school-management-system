<?php

namespace Database\Seeders;

use App\Models\School;
use Illuminate\Database\Seeder;

class SchoolTableSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {


        $schools = [];
        for ($i = 0; $i < 7; $i++) {
            $school = School::factory()->make([])->
            toArray();
            $school['name'] = json_encode($school['name']);
            gc_collect_cycles();
            $schools[] = $school;
            $school = null;
        }
        \Log::info($schools);
        School::insert($schools);
    }
}
