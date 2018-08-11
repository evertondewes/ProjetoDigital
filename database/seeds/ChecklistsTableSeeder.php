<?php

use Illuminate\Database\Seeder;

class ChecklistsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('checklists')->insert([
            ['name' => 'guia_recolhimento', 'text' => 'Guida de Recolhimento', 'project_type_id' =>'1'],
            ['name' => 'vias_memorial_descritivo', 'text' => 'Via do Memorial Descritivo da Obra', 'project_type_id' =>'1'],
            ['name' => 'plantas', 'text' => 'Plantas', 'project_type_id' =>'1'],
            ['name' => 'art_rrt', 'text' => 'ART/RRT', 'project_type_id' =>'1'],
            ['name' => 'martricula_imovel', 'text' => 'Matrícula do Imóvel', 'project_type_id' =>'1'],
            ['name' => 'memorial_descritivo_atividade', 'text' => 'Memorial Descritivo/Relatório de Atividades', 'project_type_id' =>'1'],
            ['name' => 'tratamento_afluentes', 'text' => 'Projeto de Tratamento de Efluentes', 'project_type_id' =>'1'],
            ['name' => 'ppci', 'text' => 'Certificado de Aprovação do PPCI', 'project_type_id' =>'1'],
            ['name' => 'licenca_ambiental', 'text' => 'Licença Ambiental', 'project_type_id' =>'1'],
            ['name' => 'licencia_sanitaria', 'text' => 'Licença da Vigilância Sanitária', 'project_type_id' =>'1'],
            ['name' => 'guia_recolhimento', 'text' => 'Guida de Recolhimento', 'project_type_id' =>'9'],
            ['name' => 'alvara_ou_autorizacao', 'text' => 'Alvará de Construção ou Autorização de Demolição', 'project_type_id' =>'9'],
        ]);
    }
}
