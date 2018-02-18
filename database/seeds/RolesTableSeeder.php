<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            ['name' => 'admin', 'description' => 'Administrador'],
            ['name' => 'secretario', 'description' => 'Secretário de obras'],
            ['name' => 'engenheiro', 'description' => 'Engenheiro'],
            ['name' => 'estagiario', 'description' => 'Estagiário'],
            ['name' => 'responsavel_tecnico', 'description' => 'Responsável técnico'],
            ['name' => 'cliente', 'description' => 'Cliente'],
        ]);
    }
}
