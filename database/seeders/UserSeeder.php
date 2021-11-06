<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'id' => 1,
            'email' => 'admin1@admin.com',
            'name' => 'Admin1',
            'password' => bcrypt('aleAle123@@'),
            'password_verified' => bcrypt('aleAle123@@'),
            'cellphone' => '7138526300',
            'id_card' => '00000000001',
            'date_born' => '1999-01-04',
            'city_cod' => '0000',
            'id_role' => 1,
        ]);
            
        User::create([
            'id' => 2,
            'email' => 'admin2@admin.com',
            'name' => 'Admin2',
            'password' => bcrypt('aleAle123@@'),
            'password_verified' => bcrypt('aleAle123@@'),
            'cellphone' => '7138526300',
            'id_card' => '00000000002',
            'date_born' => '1999-01-04',
            'city_cod' => '0000',
            'id_role' => 1,
        ]);

        User::create([
            'id' => 3,
            'email' => 'alemurillo104@gmail.com',
            'name' => 'Ale Murillo',
            'password' => bcrypt('aleAle123@@'),
            'password_verified' => bcrypt('aleAle123@@'),
            'cellphone' => '7138526300',
            'id_card' => '00000000003',
            'date_born' => '1999-01-04',
            'city_cod' => '0000',
            'id_role' => 2,
        ]);
        User::create([
            'id' => 4,
            'email' => 'pperez@gmail.com',
            'name' => 'Paty Perez',
            'password' => bcrypt('aleAle123@@'),
            'password_verified' => bcrypt('aleAle123@@'),
            'cellphone' => '7138526300',
            'id_card' => '00000000004',
            'date_born' => '1999-01-04',
            'city_cod' => '0000',
            'id_role' => 2,
        ]);
    }
}
