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
            ['name' => 'guia_recolhimento', 'text' => 'Guia de Recolhimento', 'project_type_id' =>'1'],
            ['name' => 'vias_memorial_descritivo', 'text' => 'Vias do Memorial Descritivo da Obra', 'project_type_id' =>'1'],
            ['name' => 'plantas', 'text' => 'Plantas Baixas', 'project_type_id' =>'1'],
            ['name' => 'art_rrt', 'text' => 'ART/RRT', 'project_type_id' =>'1'],
            ['name' => 'martricula_imovel', 'text' => 'Matrícula do Imóvel', 'project_type_id' =>'1'],
            ['name' => 'memorial_descritivo_atividade', 'text' => 'Memorial Descritivo/Relatório de Atividades', 'project_type_id' =>'1'],
            ['name' => 'tratamento_afluentes', 'text' => 'Projeto de Tratamento de Efluentes', 'project_type_id' =>'1'],
            ['name' => 'ppci', 'text' => 'Certificado de Aprovação do PPCI', 'project_type_id' =>'1'],
            ['name' => 'licenca_ambiental', 'text' => 'Licença Ambiental', 'project_type_id' =>'1'],
            ['name' => 'licencia_sanitaria', 'text' => 'Licença da Vigilância Sanitária', 'project_type_id' =>'1'],
            //Ampliacao
            ['name' => 'guia_recolhimento', 'text' => 'Guia de Recolhimento', 'project_type_id' =>'2'],
            ['name' => 'vias_memorial_descritivo', 'text' => 'Vias do Memorial Descritivo da Obra', 'project_type_id' =>'2'],
            ['name' => 'art_rrt', 'text' => 'ART/RRT', 'project_type_id' =>'2'],
            ['name' => 'martricula_imovel', 'text' => 'Matrícula do Imóvel', 'project_type_id' =>'2'],
            ['name' => 'laudo', 'text' => 'Laudo de Vistoria', 'project_type_id' =>'2'],
            ['name' => 'memorial_descritivo_atividade', 'text' => 'Memorial Descritivo/Relatório de Atividades', 'project_type_id' =>'2'],
            ['name' => 'ppci_alvara', 'text' => 'PPCDI/SPDA e Alvará Corpo de Bombeiros', 'project_type_id' =>'2'],
            ['name' => 'licenca_fepam', 'text' => 'Licença de Operação Ambiental', 'project_type_id' =>'2'],
            ['name' => 'alvara_sanitaria', 'text' => 'Alvará Vigilância Sanitária ou CEVS', 'project_type_id' =>'2'],
            //Loteamento 1
            ['name' => 'guia_recolhimento', 'text' => 'Guia de Recolhimento', 'project_type_id' =>'4'],
            ['name' => 'art_rrt', 'text' => 'ART/RRT', 'project_type_id' =>'4'],
            ['name' => 'martricula_imovel', 'text' => 'Matrícula do Imóvel', 'project_type_id' =>'4'],  
            ['name' => 'viabilidade_tecnica', 'text' => 'Declaração de Disponibilidade/Viabilidade Técnica', 'project_type_id' =>'4'],
            ['name' => 'disponibilidade_coleta', 'text' => 'Disponibilidade de Coleta de Resíduos', 'project_type_id' =>'4'],
            ['name' => 'esgotamento', 'text' => 'Solução de Esgotamento Pluvial', 'project_type_id' =>'4'],
            ['name' => 'solo', 'text' => 'Teste de Permeabilidade do Solo', 'project_type_id' =>'4'],
            ['name' => 'licenca_ambiental', 'text' => 'Licenciamento Ambiental', 'project_type_id' =>'4'],
            ['name' => 'vias_projeto', 'text' => 'Vias do Projeto de Loteamento', 'project_type_id' =>'4'],
            ['name' => 'vias_memorial_descritivo', 'text' => 'Vias do Memorial Descritivo', 'project_type_id' =>'4'],
            //Loteamento 2
            ['name' => 'guia_recolhimento', 'text' => 'Guia de Recolhimento', 'project_type_id' =>'5'],
            ['name' => 'art_rrt', 'text' => 'ART/RRT', 'project_type_id' =>'5'],
            ['name' => 'martricula_imovel', 'text' => 'Matrícula do Imóvel', 'project_type_id' =>'5'],
            ['name' => 'aprovacao_tecnico', 'text' => 'Termo de Aprovação Técnica', 'project_type_id' =>'5'],
            ['name' => 'terras', 'text' => 'Projeto de Movimentação de Terras', 'project_type_id' =>'5'],
            ['name' => 'microdrenagem', 'text' => 'Projeto de Microdrenagem Pluvial', 'project_type_id' =>'5'],
            ['name' => 'esgoto', 'text' => 'Projeto de Tratamento de Esgoto', 'project_type_id' =>'5'],
            ['name' => 'pavimentacao', 'text' => 'Projeto de Pavimentação', 'project_type_id' =>'5'],
            ['name' => 'agua', 'text' => 'Projeto de Aguá Potável', 'project_type_id' =>'5'],
            ['name' => 'energia', 'text' => 'Projeto de Distribuição de Energia', 'project_type_id' =>'5'],
            ['name' => 'termo_aprovacao', 'text' => 'Termo de Aprovação de Loteamento', 'project_type_id' =>'5'],
            ['name' => 'cronograma', 'text' => 'Cronograma Físico-Financeiro', 'project_type_id' =>'5'],
            ['name' => 'licenca_ambiental', 'text' => 'Licenciamento Ambiental', 'project_type_id' =>'5'],
            //Regularização
            ['name' => 'guia_recolhimento', 'text' => 'Guia de Recolhimento', 'project_type_id' =>'6'],
            ['name' => 'plantas', 'text' => 'Plantas Baixas', 'project_type_id' =>'6'],
            ['name' => 'art_rrt', 'text' => 'ART/RRT', 'project_type_id' =>'6'],
            ['name' => 'martricula_imovel', 'text' => 'Matrícula do Imóvel', 'project_type_id' =>'6'],
            ['name' => 'laudo_vistoria', 'text' => 'Laudo de Vistoria', 'project_type_id' =>'6'],
            ['name' => 'memorial_descritivo_atividade', 'text' => 'Memorial Descritivo/Relatório de Atividades', 'project_type_id' =>'6'],
            ['name' => 'laudo_efluentes', 'text' => 'Laudo do Sistema de Tratamento de Efluentes', 'project_type_id' =>'6'],
            ['name' => 'ppci_alvara', 'text' => 'PPCI/SPDA e Alvará do Corpo de Bombeiros', 'project_type_id' =>'6'],
            ['name' => 'licenca_fepam', 'text' => 'Licença de Operação Ambiental', 'project_type_id' =>'6'],
            ['name' => 'alvara_sanitaria', 'text' => 'Alvará Vigilância Sanitária ou CEVS', 'project_type_id' =>'6'],
            //Desdobro
            ['name' => 'guia_recolhimento', 'text' => 'Guia de Recolhimento', 'project_type_id' =>'7'],
            ['name' => 'vias_memorial_descritivo', 'text' => 'Vias do Memorial Descritivo Simplificado', 'project_type_id' =>'7'],
            ['name' => 'plantas', 'text' => 'Plantas Baixas', 'project_type_id' =>'7'],
            ['name' => 'art_rrt', 'text' => 'ART/RRT', 'project_type_id' =>'7'],
            ['name' => 'martricula_imovel', 'text' => 'Matrícula do Imóvel', 'project_type_id' =>'7'],
            //Habite-se
            ['name' => 'guia_recolhimento', 'text' => 'Guia de Recolhimento', 'project_type_id' =>'8'],
            ['name' => 'alvara_construcao', 'text' => 'Alvará de Construção', 'project_type_id' =>'8'],
            ['name' => 'martricula_imovel', 'text' => 'Matrícula do Imóvel', 'project_type_id' =>'8'],
            ['name' => 'alvara_bombeiros', 'text' => 'Alvará Corpo de Bombeiros', 'project_type_id' =>'8'],
            ['name' => 'licenca_fepam', 'text' => 'Licença de Operação Ambiental', 'project_type_id' =>'8'],
            ['name' => 'alvara_sanitaria', 'text' => 'Alvará Vigilância Sanitária ou CEVS', 'project_type_id' =>'8'],
            //Tapumes
            ['name' => 'guia_recolhimento', 'text' => 'Guia de Recolhimento', 'project_type_id' =>'9'],
            ['name' => 'alvara_ou_autorizacao', 'text' => 'Alvará de Construção ou Autorização de Demolição', 'project_type_id' =>'9'],
            //Demolicao
            ['name' => 'guia_recolhimento', 'text' => 'Guia de Recolhimento', 'project_type_id' =>'10'],
            ['name' => 'croqui', 'text' => 'Vias do Croqui da Edificação', 'project_type_id' =>'10'],
            ['name' => 'art_rrt', 'text' => 'ART/RRT', 'project_type_id' =>'10'],
            ['name' => 'martricula_imovel', 'text' => 'Matrícula do Imóvel', 'project_type_id' =>'10'],

        ]);
    }
}
