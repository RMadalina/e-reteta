<?php

namespace Database\Seeders;

use App\Models\Hospital;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HospitalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $hospitals = Hospital::all();

        if ($hospitals->count() == 0) {
            DB::table('hospitals')->insert([
                [
                    'name' => 'Spitalul Nr 1',
                    'fiscalcode'=>'RO 24567063',
                    'county'=>'Dolj',
                ],
                [
                  'name' => 'Spitalul Filantropia',
                    'fiscalcode'=>'RO 24567064',
                    'county'=>'Dolj',
                ],
                [
                  'name' => 'Spitalul Victor Babes',
                    'fiscalcode'=>'RO 24567065',
                    'county'=>'Dolj',
                ],
                [
                  'name' => 'Spitalul de Neurologie',
                    'fiscalcode'=>'RO 24567066',
                    'county'=>'Dolj',
                ],
  
            ]);
        }
    }
}
