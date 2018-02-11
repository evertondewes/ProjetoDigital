<?php

use ProjetoDigital\Models\User;
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
            'email' => 'root@example.com',
            'username' => env('ROOT_USERNAME'),
            'password' => bcrypt(env('ROOT_PASSWORD')),
            'active' => true,
            'role_id' => DB::table('roles')->where('name', 'admin')->first()->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // TESTE
        factory(User::class, 45)->create();
    }
}
