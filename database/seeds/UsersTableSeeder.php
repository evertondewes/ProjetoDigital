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
            [
                'person_id' => 1,
                'email' => 'isaac.newton@exemplo.com',
                'username' => env('ROOT_USERNAME'),
                'password' => bcrypt(env('ROOT_PASSWORD')),
                'active' => true,
                'role_id' => DB::table('roles')->where('name', 'admin')->first()->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'person_id' => 2,
                'email' => 'albert.einstein@exemplo.com',
                'username' => 'sec.alberteinstein',
                'password' => bcrypt(env('ROOT_PASSWORD')),
                'active' => true,
                'role_id' => DB::table('roles')->where('name', 'secretario')->first()->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'person_id' => 3,
                'email' => 'galileu.galilei@exemplo.com',
                'username' => 'res.galileugalilei',
                'password' => bcrypt(env('ROOT_PASSWORD')),
                'active' => true,
                'role_id' => DB::table('roles')->where('name', 'responsavel_tecnico')->first()->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'person_id' => 4,
                'email' => 'antoine.lavoisier@exemplo.com',
                'username' => 'est.antoinelavoisier',
                'password' => bcrypt(env('ROOT_PASSWORD')),
                'active' => true,
                'role_id' => DB::table('roles')->where('name', 'estagiario')->first()->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'person_id' => 5,
                'email' => 'stephen.hawking@exemplo.com',
                'username' => 'cli.stephenhawking',
                'password' => bcrypt(env('ROOT_PASSWORD')),
                'active' => true,
                'role_id' => DB::table('roles')->where('name', 'cliente')->first()->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);

        // TESTE
        // factory(User::class, 45)->create();
    }
}
