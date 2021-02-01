<?php

namespace Database\Seeders;

use App\Models\Desease;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DeseaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $deseases = Desease::all();

        if ($deseases->count() == 0) {
            DB::table('deseases')->insert([
                [
                    'name' => 'Rinita alergica',
                    'deseasecode'=>'1234',
                    
                ],
                [
                  'name' => 'Ulcer gastric',
                  'deseasecode'=>'3443',
               
                ],
                [
                  'name' => 'Sindrom vestibular',
                  'deseasecode'=>'6234',
                 
                ],
                [
                  'name' => 'Gonartroza',
                  'deseasecode'=>'4341',
                 
                ],
                [
                  'name' => 'Anemie',
                  'deseasecode'=>'9234',
                 
                ],
                [
                  'name' => 'Depresie',
                  'deseasecode'=>'7634',
                 
                ],
                [
                  'name' => 'Periatrita',
                  'deseasecode'=>'7664',
                  
                ],
                
            ]);
        }
    }
}
