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
            ['name' => 'prefeito', 'description' => 'Prefeito'],
            ['name' => 'vice_prefeito', 'description' => 'Vice Prefeito'],
            ['name' => 'secretario', 'description' => 'Secretário de obras'],
            ['name' => 'engenheiro', 'description' => 'Engenheiro'],
            ['name' => 'estagiario', 'description' => 'Estagiário'],
            ['name' => 'estagiario_externo', 'description' => 'Estagiário Externo'],
            ['name' => 'responsavel_tecnico', 'description' => 'Responsável técnico'],
            ['name' => 'requerente', 'description' => 'Requerente'],
        ]);
    }
}
