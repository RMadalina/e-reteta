<?php

namespace Database\Seeders;

use App\Models\Doctor;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $doctors = Doctor::all();

        if ($doctors->count() == 0) {
            DB::table('doctors')->insert([
                [
                    'stampno' => '123',
                    'cascontract'=>'46',
                    'user_id'=>2,
                ],
                [
                    'stampno' => '124',
                    'cascpntract'=>'70',
                    'user_id'=>3,
                ],
                
            ]);
        }
    }

  }