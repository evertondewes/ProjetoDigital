<?php

use Illuminate\Database\Seeder;

class DocumentTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('document_types')->insert([
            ['id'=> '1', 'name' => 'guia_recolhimento', 'text' => 'Guia de Recolhimento'],
            ['id'=> '2','name' => 'vias_memorial_descritivo', 'text' => 'Vias do Memorial Descritivo da Obra'],
            ['id'=> '3','name' => 'plantas', 'text' => 'Plantas Baixas'],
            ['id'=> '4','name' => 'art_rrt', 'text' => 'ART/RRT'],
            ['id'=> '5','name' => 'martricula_imovel', 'text' => 'Matrícula do Imóvel'],
            ['id'=> '6','name' => 'memorial_descritivo_atividade', 'text' => 'Memorial Descritivo/Relatório de Atividades'],
            ['id'=> '7','name' => 'tratamento_afluentes', 'text' => 'Projeto de Tratamento de Efluentes'],
            ['id'=> '8','name' => 'ppci', 'text' => 'Certificado de Aprovação do PPCI'],
            ['id'=> '9','name' => 'licenca_ambiental', 'text' => 'Licença Ambiental'],
            ['id'=> '10','name' => 'licenca_sanitaria', 'text' => 'Licença da Vigilância Sanitária'],
            //Ampliacao
//            ['name' => 'guia_recolhimento', 'text' => 'Guia de Recolhimento'],
//            ['name' => 'vias_memorial_descritivo', 'text' => 'Vias do Memorial Descritivo da Obra'],
//            ['name' => 'art_rrt', 'text' => 'ART/RRT'],
//            ['name' => 'martricula_imovel', 'text' => 'Matrícula do Imóvel'],
            ['id'=> '11','name' => 'laudo', 'text' => 'Laudo de Vistoria'],
//            ['name' => 'memorial_descritivo_atividade', 'text' => 'Memorial Descritivo/Relatório de Atividades'],
            ['id'=> '12','name' => 'ppci_alvara', 'text' => 'PPCDI/SPDA e Alvará Corpo de Bombeiros'],
            ['id'=> '13','name' => 'licenca_fepam', 'text' => 'Licença de Operação Ambiental'],
            ['id'=> '14','name' => 'alvara_sanitaria', 'text' => 'Alvará Vigilância Sanitária ou CEVS'],
            //Loteamento 1
//            ['name' => 'guia_recolhimento', 'text' => 'Guia de Recolhimento'],
//            ['name' => 'art_rrt', 'text' => 'ART/RRT'],
//            ['name' => 'martricula_imovel', 'text' => 'Matrícula do Imóvel'],
            ['id'=> '15','name' => 'viabilidade_tecnica', 'text' => 'Declaração de Disponibilidade/Viabilidade Técnica'],
            ['id'=> '16','name' => 'disponibilidade_coleta', 'text' => 'Disponibilidade de Coleta de Resíduos'],
            ['id'=> '17','name' => 'esgotamento', 'text' => 'Solução de Esgotamento Pluvial'],
            ['id'=> '18','name' => 'solo', 'text' => 'Teste de Permeabilidade do Solo'],
//            ['name' => 'licenca_ambiental', 'text' => 'Licenciamento Ambiental'],
            ['id'=> '19','name' => 'vias_projeto', 'text' => 'Vias do Projeto de Loteamento'],
//            ['name' => 'vias_memorial_descritivo', 'text' => 'Vias do Memorial Descritivo'],
            //Loteamento 2
//            ['name' => 'guia_recolhimento', 'text' => 'Guia de Recolhimento'],
//            ['name' => 'art_rrt', 'text' => 'ART/RRT'],
//            ['name' => 'martricula_imovel', 'text' => 'Matrícula do Imóvel'],
            ['id'=> '20','name' => 'aprovacao_tecnico', 'text' => 'Termo de Aprovação Técnica'],
            ['id'=> '21','name' => 'terras', 'text' => 'Projeto de Movimentação de Terras'],
            ['id'=> '22','name' => 'microdrenagem', 'text' => 'Projeto de Microdrenagem Pluvial'],
            ['id'=> '23','name' => 'pavimentacao', 'text' => 'Projeto de Pavimentação'],
            ['id'=> '24','name' => 'agua', 'text' => 'Projeto de Aguá Potável'],
            ['id'=> '25','name' => 'energia', 'text' => 'Projeto de Distribuição de Energia'],
            ['id'=> '26','name' => 'termo_aprovacao', 'text' => 'Termo de Aprovação de Loteamento'],
            ['id'=> '27','name' => 'cronograma', 'text' => 'Cronograma Físico-Financeiro'],
//            ['name' => 'licenca_ambiental', 'text' => 'Licenciamento Ambiental'],
            //Regularização
//            ['name' => 'guia_recolhimento', 'text' => 'Guia de Recolhimento'],
//            ['name' => 'plantas', 'text' => 'Plantas Baixas'],
//            ['name' => 'art_rrt', 'text' => 'ART/RRT'],
//            ['name' => 'martricula_imovel', 'text' => 'Matrícula do Imóvel'],
            ['id'=> '28','name' => 'laudo_vistoria', 'text' => 'Laudo de Vistoria'],
//            ['name' => 'memorial_descritivo_atividade', 'text' => 'Memorial Descritivo/Relatório de Atividades'],
            ['id'=> '29','name' => 'laudo_efluentes', 'text' => 'Laudo do Sistema de Tratamento de Efluentes'],
//            ['name' => 'ppci_alvara', 'text' => 'PPCI/SPDA e Alvará do Corpo de Bombeiros'],
//            ['name' => 'licenca_fepam', 'text' => 'Licença de Operação Ambiental'],
//            ['name' => 'alvara_sanitaria', 'text' => 'Alvará Vigilância Sanitária ou CEVS'],
            //Desdobro
//            ['name' => 'guia_recolhimento', 'text' => 'Guia de Recolhimento'],
//            ['name' => 'vias_memorial_descritivo', 'text' => 'Vias do Memorial Descritivo Simplificado'],
//            ['name' => 'plantas', 'text' => 'Plantas Baixas', 'project_type_id' =>'7'],
//            ['name' => 'art_rrt', 'text' => 'ART/RRT', 'project_type_id' =>'7'],
//            ['name' => 'martricula_imovel', 'text' => 'Matrícula do Imóvel'],
            //Habite-se
//            ['name' => 'guia_recolhimento', 'text' => 'Guia de Recolhimento'],
            ['id'=> '30','name' => 'alvara_construcao', 'text' => 'Alvará de Construção'],
//            ['name' => 'martricula_imovel', 'text' => 'Matrícula do Imóvel'],
            ['id'=> '31','name' => 'alvara_bombeiros', 'text' => 'Alvará Corpo de Bombeiros'],
//            ['name' => 'licenca_fepam', 'text' => 'Licença de Operação Ambiental'],
//            ['name' => 'alvara_sanitaria', 'text' => 'Alvará Vigilância Sanitária ou CEVS'],
            //Tapumes
//            ['name' => 'guia_recolhimento', 'text' => 'Guia de Recolhimento'],
            ['id'=> '32','name' => 'alvara_ou_autorizacao', 'text' => 'Alvará de Construção ou Autorização de Demolição'],
            //Demolicao
//            ['name' => 'guia_recolhimento', 'text' => 'Guia de Recolhimento'],
            ['id'=> '33','name' => 'croqui', 'text' => 'Vias do Croqui da Edificação'],
//            ['name' => 'art_rrt', 'text' => 'ART/RRT'],
//            ['name' => 'martricula_imovel', 'text' => 'Matrícula do Imóvel'],
            ['id'=> '34','name' => 'esgoto', 'text' => 'Projeto de Tratamento de Esgoto'],

        ]);
    }
}
