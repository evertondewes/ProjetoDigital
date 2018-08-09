<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('project_types')->insert([
            ['name' => 'edificacao_nova', 'description' => 'Aprovação de Projeto/Alvará de Construção'],
            ['name' => 'edificacao_ampliacao', 'description' => 'Projeto de Amplicação/Alvará de Construção'],
            ['name' => 'edificacao_reforma', 'description' => 'Reforma de Edificação'],
            ['name' => 'loteamento_1fase', 'description' => 'Aprovação de Loteamentos Urbanos em 1ª Fase (Aprovação Urbanística)'],
            ['name' => 'loteamento_2fase', 'description' => 'Aprovação de Loteamentos Urbanos em 2ª Fase (Aprovação Execução de Obras)'],
            ['name' => 'construcao_regularizacao', 'description' => 'Regularização de Construção/Obra Concluída'],
            ['name' => 'lotes_desmembramento_remembramento', 'description' => 'Desmembramento / Remembramento de Lote'],
            ['name' => 'certidao_habitese', 'description' => 'Certidão de Habite-se'],
            ['name' => 'autorizacao_tapume', 'description' => 'Autorização de Tapume'],
            ['name' => 'autorizacao_demolicao', 'description' => 'Autorização de Demolição'],
        ]);
    }
}
