<?php

namespace Database\Seeders;

use App\Models\Diagnose;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
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
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')

                    
                ],
                [
                  'cnp'=>'2781201163464',
                    'deseasecode'=>'3443',
                    'doctor_id'=>1,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')

                ],
                [
                  'cnp'=>'1741201163464',
                    'deseasecode'=>'4341',
                    'doctor_id'=>2,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')

                ],
                [
                    
                    'cnp'=>'2410211634645',
                    'deseasecode'=>'6234',
                    'doctor_id'=>1,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')


                    
                ],
                
            ]);
        }
    }
}
