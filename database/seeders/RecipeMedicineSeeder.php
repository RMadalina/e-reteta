<?php

namespace Database\Seeders;

use App\Models\RecipeMedicine;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RecipeMedicineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $recipeMedicines = RecipeMedicine::all();

        if ($recipeMedicines->count() == 0) {
            DB::table('recipes_medicines')->insert([
                [
                    'recipe_id' => 1,
                    'medicinecode'=>2134,
                    'quantity'=>2,
                    
                ],
                [
                  'recipe_id' => 1,
                    'medicinecode'=>134,
                    'quantity'=>3,
                ],
                [
                  'recipe_id' => 2,
                    'medicinecode'=>166,
                    'quantity'=>1,
                 
                ],
                [
                  'recipe_id' => 2,
                    'medicinecode'=>165,
                    'quantity'=>10,
                 
                ],
                [
                  'recipe_id' => 3,
                    'medicinecode'=>284,
                    'quantity'=>5,
                 
                ],
                [
                  'recipe_id' => 3,
                    'medicinecode'=>134,
                    'quantity'=>10,
                 
                ],
                [
                  'recipe_id' => 4,
                    'medicinecode'=>2134,
                    'quantity'=>5,
                 
                ],
                [
                  'recipe_id' => 4,
                    'medicinecode'=>284,
                    'quantity'=>5,
                 
                ],
                [
                  'recipe_id' => 4,
                    'medicinecode'=>124,
                    'quantity'=>5,
                 
                ],
                
            ]);
        }
    }
}
