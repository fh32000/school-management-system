<?php

namespace Database\Seeders;

use App\Models\Fee;
use App\Models\Grade;
use Illuminate\Database\Seeder;

class FeeTableSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {

        $grads = Grade::with('classrooms')->get();

        $fees = [];
        //  رسوم دراسية','رسوم باص
        foreach ($grads as $grad) {
            foreach ($grad->classrooms as $classroom) {
                $fee = Fee::factory()->make([
                    'grade_id' => $grad->id,
                    'classroom_id' => $classroom->id,
                    'type' => 1,
                ])->
                toArray();
                $fee['title'] = json_encode($fee['title']);
                $fees[] = $fee;
                $fee = null;
                $fee = Fee::factory()->make([
                    'grade_id' => $grad->id,
                    'classroom_id' => $classroom->id,
                    'type' => 2,
                ])->
                toArray();
                $fee['title'] = json_encode($fee['title']);
                $fees[] = $fee;
                $fee = null;

            }


        }

        Fee::insert($fees);
    }
}
