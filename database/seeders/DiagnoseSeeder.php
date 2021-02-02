<?php

namespace Database\Seeders;

use App\Models\Diagnose;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DiagnoseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $diagnoses = Diagnose::all();

        if ($diagnoses->count() == 0) {
            DB::table('diagnoses')->insert([
                [
                    
                    'cnp'=>'2410211634645',
                    'deseasecode'=>'9234',
                    'doctor_id'=>1,

                    
                ],
                [
                  'cnp'=>'2781201163464',
                    'deseasecode'=>'3443',
                    'doctor_id'=>1,
               
                ],
                [
                  'cnp'=>'1741201163464',
                    'deseasecode'=>'4341',
                    'doctor_id'=>2,
                ],
                
                
            ]);
        }
    }
}
