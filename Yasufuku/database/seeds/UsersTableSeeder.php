<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
     {
            DB::table('users')->insert([
                   'name' => 'admin',
                   'email' => 'admin@mail.com',
                   'password' => bcrypt('admin123'),
                   'role' => 'admin'
            ]);

            // second user with subscriber role
            DB::table('users')->insert([
                   'name' => 'Nuunu',
                   'email' => 'wrferdian@outlook.com',
                   'password' => bcrypt('secret123'),
                   'role' => 'ppic'
            ]);
    }
}
