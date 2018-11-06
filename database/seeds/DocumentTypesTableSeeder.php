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
            ['name' => 'guia_recolhimento', 'title' => 'Guia de Recolhimento', 'text' => 'Requerimento específico dirigo ao Prefeito Municipal com guia de recolhimento paga'],
            ['name' => 'vias_memorial_descritivo', 'title' => 'Vias do Memorial Descritivo da Obra', 'text' => ' '],
            ['name' => 'plantas', 'title' => 'Plantas Baixas', 'text' => 'Uma via, em escala propriada -formatação padrão ABNT-, do Projeto Arquitetônico: Planta Baixa, Planta de Cobertura, Corte Longitudinal e Transversal, Fachadas, Planta da Situação/Localização; Planta Instalações Elétricas; Planta Instalações Hidrossanitárias com localização no Sistema de Tratamento de Esgoto'],
            ['name' => 'art_rrt', 'title' => 'ART/RRT', 'text' => ' '],
            ['name' => 'martricula_imovel', 'title' => 'Matrícula do Imóvel', 'text' => ' '],
            ['name' => 'memorial_descritivo_atividade', 'title' => 'Memorial Descritivo/Relatório de Atividades', 'text' => ' '],
            ['name' => 'tratamento_afluentes', 'title' => 'Projeto de Tratamento de Efluentes', 'text' => ' '],
            ['name' => 'ppci', 'title' => 'Certificado de Aprovação do PPCI', 'text' => ' '],
            ['name' => 'licenca_ambiental', 'title' => 'Licença Ambiental', 'text' => ' '],
            ['name' => 'licenca_sanitaria', 'title' => 'Licença da Vigilância Sanitária', 'text' => ' '],
            //Ampliacao
//            ['name' => 'guia_recolhimento', 'title' => 'Guia de Recolhimento', 'text' => ' '],
//            ['name' => 'vias_memorial_descritivo', 'title' => 'Vias do Memorial Descritivo da Obra', 'text' => ' '],
//            ['name' => 'art_rrt', 'title' => 'ART/RRT', 'text' => ' '],
//            ['name' => 'martricula_imovel', 'title' => 'Matrícula do Imóvel', 'text' => ' '],
            ['name' => 'laudo', 'title' => 'Laudo de Vistoria', 'text' => ' '],
//            ['name' => 'memorial_descritivo_atividade', 'title' => 'Memorial Descritivo/Relatório de Atividades', 'text' => ' '],
            ['name' => 'ppci_alvara', 'title' => 'PPCDI/SPDA e Alvará Corpo de Bombeiros', 'text' => ' '],
            ['name' => 'licenca_fepam', 'title' => 'Licença de Operação Ambiental', 'text' => ' '],
            ['name' => 'alvara_sanitaria', 'title' => 'Alvará Vigilância Sanitária ou CEVS', 'text' => ' '],
            //Loteamento 1
//            ['name' => 'guia_recolhimento', 'title' => 'Guia de Recolhimento', 'text' => ' '],
//            ['name' => 'art_rrt', 'title' => 'ART/RRT', 'text' => ' '],
//            ['name' => 'martricula_imovel', 'title' => 'Matrícula do Imóvel', 'text' => ' '],
            ['name' => 'viabilidade_tecnica', 'title' => 'Declaração de Disponibilidade/Viabilidade Técnica', 'text' => ' '],
            ['name' => 'disponibilidade_coleta', 'title' => 'Disponibilidade de Coleta de Resíduos', 'text' => ' '],
            ['name' => 'esgotamento', 'title' => 'Solução de Esgotamento Pluvial', 'text' => ' '],
            ['name' => 'solo', 'title' => 'Teste de Permeabilidade do Solo', 'text' => ' '],
//            ['name' => 'licenca_ambiental', 'title' => 'Licenciamento Ambiental', 'text' => ' '],
            ['name' => 'vias_projeto', 'title' => 'Vias do Projeto de Loteamento', 'text' => ' '],
//            ['name' => 'vias_memorial_descritivo', 'title' => 'Vias do Memorial Descritivo', 'text' => ' '],
            //Loteamento 2
//            ['name' => 'guia_recolhimento', 'title' => 'Guia de Recolhimento', 'text' => ' '],
//            ['name' => 'art_rrt', 'title' => 'ART/RRT', 'text' => ' '],
//            ['name' => 'martricula_imovel', 'title' => 'Matrícula do Imóvel', 'text' => ' '],
            ['name' => 'aprovacao_tecnico', 'title' => 'Termo de Aprovação Técnica', 'text' => ' '],
            ['name' => 'terras', 'title' => 'Projeto de Movimentação de Terras', 'text' => ' '],
            ['name' => 'microdrenagem', 'title' => 'Projeto de Microdrenagem Pluvial', 'text' => ' '],
            ['name' => 'pavimentacao', 'title' => 'Projeto de Pavimentação', 'text' => ' '],
            ['name' => 'agua', 'title' => 'Projeto de Aguá Potável', 'text' => ' '],
            ['name' => 'energia', 'title' => 'Projeto de Distribuição de Energia', 'text' => ' '],
            ['name' => 'termo_aprovacao', 'title' => 'Termo de Aprovação de Loteamento', 'text' => ' '],
            ['name' => 'cronograma', 'title' => 'Cronograma Físico-Financeiro', 'text' => ' '],
//            ['name' => 'licenca_ambiental', 'title' => 'Licenciamento Ambiental', 'text' => ' '],
            //Regularização
//            ['name' => 'guia_recolhimento', 'title' => 'Guia de Recolhimento', 'text' => ' '],
//            ['name' => 'plantas', 'title' => 'Plantas Baixas', 'text' => ' '],
//            ['name' => 'art_rrt', 'title' => 'ART/RRT', 'text' => ' '],
//            ['name' => 'martricula_imovel', 'title' => 'Matrícula do Imóvel', 'text' => ' '],
            ['name' => 'laudo_vistoria', 'title' => 'Laudo de Vistoria', 'text' => ' '],
//            ['name' => 'memorial_descritivo_atividade', 'title' => 'Memorial Descritivo/Relatório de Atividades', 'text' => ' '],
            ['name' => 'laudo_efluentes', 'title' => 'Laudo do Sistema de Tratamento de Efluentes', 'text' => ' '],
//            ['name' => 'ppci_alvara', 'title' => 'PPCI/SPDA e Alvará do Corpo de Bombeiros', 'text' => ' '],
//            ['name' => 'licenca_fepam', 'title' => 'Licença de Operação Ambiental', 'text' => ' '],
//            ['name' => 'alvara_sanitaria', 'title' => 'Alvará Vigilância Sanitária ou CEVS', 'text' => ' '],
            //Desdobro
//            ['name' => 'guia_recolhimento', 'title' => 'Guia de Recolhimento', 'text' => ' '],
//            ['name' => 'vias_memorial_descritivo', 'title' => 'Vias do Memorial Descritivo Simplificado', 'text' => ' '],
//            ['name' => 'plantas', 'title' => 'Plantas Baixas', 'project_type_id' =>'7', 'text' => ' '],
//            ['name' => 'art_rrt', 'title' => 'ART/RRT', 'project_type_id' =>'7', 'text' => ' '],
//            ['name' => 'martricula_imovel', 'title' => 'Matrícula do Imóvel', 'text' => ' '],
            //Habite-se
//            ['name' => 'guia_recolhimento', 'title' => 'Guia de Recolhimento', 'text' => ' '],
            ['name' => 'alvara_construcao', 'title' => 'Alvará de Construção', 'text' => ' '],
//            ['name' => 'martricula_imovel', 'title' => 'Matrícula do Imóvel', 'text' => ' '],
            ['name' => 'alvara_bombeiros', 'title' => 'Alvará Corpo de Bombeiros', 'text' => ' '],
//            ['name' => 'licenca_fepam', 'title' => 'Licença de Operação Ambiental', 'text' => ' '],
//            ['name' => 'alvara_sanitaria', 'title' => 'Alvará Vigilância Sanitária ou CEVS', 'text' => ' '],
            //Tapumes
//            ['name' => 'guia_recolhimento', 'title' => 'Guia de Recolhimento', 'text' => ' '],
            ['name' => 'alvara_ou_autorizacao', 'title' => 'Alvará de Construção ou Autorização de Demolição', 'text' => ' '],
            //Demolicao
//            ['name' => 'guia_recolhimento', 'title' => 'Guia de Recolhimento', 'text' => ' '],
            ['name' => 'croqui', 'title' => 'Vias do Croqui da Edificação', 'text' => ' '],
//            ['name' => 'art_rrt', 'title' => 'ART/RRT', 'text' => ' '],
//            ['name' => 'martricula_imovel', 'title' => 'Matrícula do Imóvel', 'text' => ' '],
            ['name' => 'esgoto', 'title' => 'Projeto de Tratamento de Esgoto', 'text' => ' '],

        ]);
    }
}
