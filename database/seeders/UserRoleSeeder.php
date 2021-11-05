<?php

namespace Database\Seeders;

use App\Models\UserRole;
use Illuminate\Database\Seeder;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserRole::create([
            'id' => 1,
            'id_user' => 1,
            'id_role' => 1,
        ]);

        UserRole::create([
            'id' => 2,
            'id_user' => 2,
            'id_role' => 1,
        ]);

        UserRole::create([
            'id' => 3,
            'id_user' => 3,
            'id_role' => 2,
        ]);
    }
}
