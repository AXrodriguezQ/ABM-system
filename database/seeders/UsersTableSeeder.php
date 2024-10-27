<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Juan',
                'lastname' => 'Pérez',
                'email' => 'juan@example.com',
                'phone' => '123456789',
                'password' => bcrypt('password'),
                'created_by' => 1,
                'is_restricted' => 'Valido',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Andrea',
                'lastname' => 'Lopez',
                'email' => 'andre@example.com',
                'phone' => '3016567688',
                'password' => bcrypt('andreymaria'),
                'created_by' => 1,
                'is_restricted' => 'Valido',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Carlos',
                'lastname' => 'Lopera',
                'email' => 'carlos@gmail.com',
                'phone' => '3011567688',
                'password' => bcrypt('carlitosPro'),
                'created_by' => 2,
                'is_restricted' => 'Valido',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
