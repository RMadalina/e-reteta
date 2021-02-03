<?php

namespace Database\Seeders;

use App\Models\Recipe;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RecipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $recipes = Recipe::all();

        if ($recipes->count() == 0) {
            DB::table('recipes')->insert([
                [

                    'diagnose_id'=>1,
                    'hospital_id'=>1,
 
                ],
                [
                    'diagnose_id'=>2,
                    'hospital_id'=>3,
 
               
                ],
                [
                    'diagnose_id'=>3,
                    'hospital_id'=>1,
 
                ],
                [
                    'diagnose_id'=>4,
                    'hospital_id'=>1,
 
                ],
                
                
            ]);
        }
    }
}
