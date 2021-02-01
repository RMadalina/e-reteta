<?php

namespace Database\Seeders;

use App\Models\Medicine;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MedicineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $medicines = Medicine::all();

        if ($medicines->count() == 0) {
            DB::table('medicines')->insert([
                [
                    'name' => 'Claritine',
                    'medicinecode'=>234,
                    'price'=>25,
                ],
                [
                  'name' => 'Nexium',
                  'medicinecode'=>165,
                  'price'=>60,
                ],
                [
                  'name' => 'Omeprazol',
                  'medicinecode'=>166,
                  'price'=>10,
                ],
                [
                  'name' => 'Betaserc',
                  'medicinecode'=>2134,
                  'price'=>60,
                ],
                [
                  'name' => 'Fier',
                  'medicinecode'=>124,
                  'price'=>20,
                ],
                [
                  'name' => 'Vitamina C',
                  'medicinecode'=>134,
                  'price'=>10,
                ],
                [
                  'name' => 'Neuromultivit',
                  'medicinecode'=>284,
                  'price'=>30,
                ],
                [
                  'name' => 'Celadrin',
                  'medicinecode'=>434,
                  'price'=>70,
                ]
            ]);
        }
    }
}
