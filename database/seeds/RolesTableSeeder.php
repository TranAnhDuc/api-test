<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'role_name' => 'user',
            'id' => 1
        ]);

        DB::table('roles')->insert([
            'role_name' => 'admin',
            'id' => 2
        ]);
    }
}
