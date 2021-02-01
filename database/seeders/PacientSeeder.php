<?php

namespace Database\Seeders;

use App\Models\Pacient;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PacientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pacients = Pacient::all();

        if ($pacients->count() == 0) {
            DB::table('pacients')->insert([
                [
                    'cnp' => 1741201163464,
                    'age'=>46,
                    'insurancetype'=>'A',
                    'user_id'=>4,
                ],
                [
                    'cnp' => 2410211634645,
                    'age'=>70,
                    'insurancetype'=>'B',
                    'user_id'=>5,
                ],
                [
                    'cnp' => 1641201163464,
                    'age'=>56,
                    'insurancetype'=>'C',
                    'user_id'=>6,
                ],
                [
                    'cnp' => 2781201163464,
                    'age'=>42,
                    'insurancetype'=>'D',
                    'user_id'=>7,
                ],
                
            ]);
        }
    }

  }