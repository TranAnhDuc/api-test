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
            'name' => 'user',
            'email' => 'user@api-test.test',
            'password' => app('hash')->make('secret'),
            'role_id' => 1
        ]);

        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@api-test.test',
            'password' => app('hash')->make('secret'),
            'role_id' => 2
        ]);
    }
}
