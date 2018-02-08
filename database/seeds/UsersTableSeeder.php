<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            'username' => env('ROOT_USERNAME'),
            'password' => bcrypt(env('ROOT_PASSWORD')),
            'role_id' => DB::table('roles')->where('name', 'admin')->first()->id,
        ]);
    }
}
