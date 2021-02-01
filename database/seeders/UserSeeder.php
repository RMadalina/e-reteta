<?php

namespace Database\Seeders;
use App\Models\User;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();

        if ($users->count() == 0) {
            DB::table('users')->insert([
                [
                    'name' => 'admin',
                    'email' => 'admin@admin.com',
                    'password' => bcrypt('secret'),
                    'role_id' => 1
                ],
                [
                    'name' => 'Doctor1',
                    'email' => 'doctor1@clinica.com',
                    'password' => bcrypt('secret'),
                    'role_id' => 2
                ],
                [
                  'name' => 'Doctor2',
                  'email' => 'doctor2@clinica.com',
                  'password' => bcrypt('secret'),
                  'role_id' => 2
              ],
                [
                    'name' => 'Pacient1',
                    'email' => 'pacient1@yahoo.com',
                    'password' => bcrypt('secret'),
                    'role_id' => 3,
                ],
                [
                    'name' => 'Pacient2',
                    'email' => 'pacient2@yahoo.com',
                    'password' => bcrypt('secret'),
                    'role_id' => 3,
                ],
                [
                    'name' => 'Pacient3',
                    'email' => 'pacient3@yahoo.com',
                    'password' => bcrypt('secret'),
                    'role_id' => 3,
                ],
                [
                    'name' => 'Pacient4',
                    'email' => 'pacient4@yahoo.com',
                    'password' => bcrypt('secret'),
                    'role_id' => 3,
                ],
              
            ]);
        }
    }
}
