<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(DoctorSeeder::class);
        $this->call(PacientSeeder::class);
        $this->call(HospitalSeeder::class);
        $this->call(MedicineSeeder::class);
        $this->call(DeseaseSeeder::class);
        $this->call(DiagnoseSeeder::class); 
        $this->call(RecipeSeeder::class);
        $this->call(RecipeMedicineSeeder::class);
        
       

    }
}
