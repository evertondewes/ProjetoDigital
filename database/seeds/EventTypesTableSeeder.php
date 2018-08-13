<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('event_types')->insert([
            ['name' => 'aprovado', 'description' => 'Status modficiado para Autorizado'],
            ['name' => 'indeferido', 'description' => 'Status modficiado para Indeferido'],
            ['name' => 'pendencias', 'description' => 'Status modficiado para Pendente'],
            ['name' => 'aguardando_vistoria', 'description' => 'Status modificado para Aguardando Vistoria'],
            ['name' => 'usuario_registrado', 'description' => 'Usuário Registrado'],
            ['name' => 'usuario_aprovado', 'description' => 'Usuário Aprovado'],
            ['name' => 'projeto_criado', 'description' => 'Projeto Criado'],
            ['name' => 'projeto_editado', 'description' => 'Projeto Editado'],
            ['name' => 'projeto_excluido', 'description' => 'Projeto Excluído'],
        ]);
    }
}
