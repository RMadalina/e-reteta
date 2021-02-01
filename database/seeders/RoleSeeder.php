<?php

namespace Database\Seeders;

use App\Models\Role;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = Role::all();

        if ($roles->count() == 0) {
            DB::table('roles')->insert([
                [
                    'id'=>1,
                    'name' => 'Administrator',
                    
                ],
                [
                    'id'=>2,
                    'name' => 'Doctor',
                    
                ],
                [   
                    'id'=>3,
                    'name' => 'Pacient',
                   
                ]
            ]);
        }
    }
}
