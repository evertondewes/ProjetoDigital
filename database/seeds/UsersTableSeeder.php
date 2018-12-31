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
                'person_id' => DB::table('people')->where('email', 'prefeito@cerrolargo.rs.gov.br')->first()->id,
                'email' => 'prefeito@cerrolargo.rs.gov.br',
                'username' => 'prefeito',
                'password' => bcrypt(env('ROOT_PASSWORD')),
                'active' => true,
                'role_id' => DB::table('roles')->where('name', 'prefeito')->first()->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'person_id' => DB::table('people')->where('email', 'vice_prefeito@cerrolargo.rs.gov.br')->first()->id,
                'email' => 'vice_prefeito@cerrolargo.rs.gov.br',
                'username' => 'vice_prefeito',
                'password' => bcrypt(env('ROOT_PASSWORD')),
                'active' => true,
                'role_id' => DB::table('roles')->where('name', 'vice_prefeito')->first()->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'person_id' => DB::table('people')->where('email', 'isaac.newton@exemplo.com')->first()->id,
                'email' => 'isaac.newton@exemplo.com',
                'username' => env('ROOT_USERNAME'),
                'password' => bcrypt(env('ROOT_PASSWORD')),
                'active' => true,
                'role_id' => DB::table('roles')->where('name', 'admin')->first()->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'person_id' => DB::table('people')->where('email', 'albert.einstein@exemplo.com')->first()->id,
                'email' => 'albert.einstein@exemplo.com',
                'username' => 'sec.alberteinstein',
                'password' => bcrypt(env('ROOT_PASSWORD')),
                'active' => true,
                'role_id' => DB::table('roles')->where('name', 'secretario')->first()->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'person_id' => DB::table('people')->where('email', 'galileu.galilei@exemplo.com')->first()->id,
                'email' => 'galileu.galilei@exemplo.com',
                'username' => 'res.galileugalilei',
                'password' => bcrypt(env('ROOT_PASSWORD')),
                'active' => true,
                'role_id' => DB::table('roles')->where('name', 'responsavel_tecnico')->first()->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'person_id' => DB::table('people')->where('email', 'antoine.lavoisier@exemplo.com')->first()->id,
                'email' => 'antoine.lavoisier@exemplo.com',
                'username' => 'est.antoinelavoisier',
                'password' => bcrypt(env('ROOT_PASSWORD')),
                'active' => true,
                'role_id' => DB::table('roles')->where('name', 'estagiario')->first()->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'person_id' => DB::table('people')->where('email', 'stephen.hawking@exemplo.com')->first()->id,
                'email' => 'stephen.hawking@exemplo.com',
                'username' => 'cli.stephenhawking',
                'password' => bcrypt(env('ROOT_PASSWORD')),
                'active' => true,
                'role_id' => DB::table('roles')->where('name', 'requerente')->first()->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);

        // TESTE
        // factory(User::class, 45)->create();
    }
}
