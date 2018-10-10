<?php

use Illuminate\Database\Seeder;
use \ProjetoDigital\Models\ProjectType;
use \ProjetoDigital\Models\DocumentType;

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
            ['project_type_id' => ProjectType::where('name', 'edificacao_nova')->first()->id, 'document_type_id' => DocumentType::where('name', 'guia_recolhimento')->first()->id],
            ['project_type_id' => ProjectType::where('name', 'edificacao_nova')->first()->id, 'document_type_id' => DocumentType::where('name', 'vias_memorial_descritivo')->first()->id],
            ['project_type_id' => ProjectType::where('name', 'edificacao_nova')->first()->id, 'document_type_id' => DocumentType::where('name', 'plantas')->first()->id],
            ['project_type_id' => ProjectType::where('name', 'edificacao_nova')->first()->id, 'document_type_id' => DocumentType::where('name', 'art_rrt')->first()->id],
            ['project_type_id' => ProjectType::where('name', 'edificacao_nova')->first()->id, 'document_type_id' => DocumentType::where('name', 'martricula_imovel')->first()->id],
            ['project_type_id' => ProjectType::where('name', 'edificacao_nova')->first()->id, 'document_type_id' => DocumentType::where('name', 'memorial_descritivo_atividade')->first()->id],
            ['project_type_id' => ProjectType::where('name', 'edificacao_nova')->first()->id, 'document_type_id' => DocumentType::where('name', 'tratamento_afluentes')->first()->id],
            ['project_type_id' => ProjectType::where('name', 'edificacao_nova')->first()->id, 'document_type_id' => DocumentType::where('name', 'ppci')->first()->id],
            ['project_type_id' => ProjectType::where('name', 'edificacao_nova')->first()->id, 'document_type_id' => DocumentType::where('name', 'licenca_ambiental')->first()->id],
            ['project_type_id' => ProjectType::where('name', 'edificacao_nova')->first()->id, 'document_type_id' => DocumentType::where('name', 'licenca_sanitaria')->first()->id],
            //Ampliacao                                                        ProjectType::where('name', 'edificacao_ampliacao')->first()->id
            ['project_type_id' => ProjectType::where('name', 'edificacao_ampliacao')->first()->id, 'document_type_id' => DocumentType::where('name', 'guia_recolhimento')->first()->id],
            ['project_type_id' => ProjectType::where('name', 'edificacao_ampliacao')->first()->id, 'document_type_id' => DocumentType::where('name', 'vias_memorial_descritivo')->first()->id],
            ['project_type_id' => ProjectType::where('name', 'edificacao_ampliacao')->first()->id, 'document_type_id' => DocumentType::where('name', 'art_rrt')->first()->id],
            ['project_type_id' => ProjectType::where('name', 'edificacao_ampliacao')->first()->id, 'document_type_id' => DocumentType::where('name', 'martricula_imovel')->first()->id],
            ['project_type_id' => ProjectType::where('name', 'edificacao_ampliacao')->first()->id, 'document_type_id' => DocumentType::where('name', 'laudo')->first()->id],
            ['project_type_id' => ProjectType::where('name', 'edificacao_ampliacao')->first()->id, 'document_type_id' => DocumentType::where('name', 'memorial_descritivo_atividade')->first()->id],
            ['project_type_id' => ProjectType::where('name', 'edificacao_ampliacao')->first()->id, 'document_type_id' => DocumentType::where('name', 'ppci_alvara')->first()->id],
            ['project_type_id' => ProjectType::where('name', 'edificacao_ampliacao')->first()->id, 'document_type_id' => DocumentType::where('name', 'licenca_fepam')->first()->id],
            ['project_type_id' => ProjectType::where('name', 'edificacao_ampliacao')->first()->id, 'document_type_id' => DocumentType::where('name', 'alvara_sanitaria')->first()->id],
//            //Loteamento 1
            ['project_type_id' => ProjectType::where('name', 'loteamento_1fase')->first()->id, 'document_type_id' => DocumentType::where('name', 'guia_recolhimento')->first()->id],
            ['project_type_id' => ProjectType::where('name', 'loteamento_1fase')->first()->id, 'document_type_id' => DocumentType::where('name', 'art_rrt')->first()->id],
            ['project_type_id' => ProjectType::where('name', 'loteamento_1fase')->first()->id, 'document_type_id' => DocumentType::where('name', 'martricula_imovel')->first()->id],
            ['project_type_id' => ProjectType::where('name', 'loteamento_1fase')->first()->id, 'document_type_id' => DocumentType::where('name', 'viabilidade_tecnica')->first()->id],
            ['project_type_id' => ProjectType::where('name', 'loteamento_1fase')->first()->id, 'document_type_id' => DocumentType::where('name', 'disponibilidade_coleta')->first()->id],
            ['project_type_id' => ProjectType::where('name', 'loteamento_1fase')->first()->id, 'document_type_id' => DocumentType::where('name', 'esgotamento')->first()->id],
            ['project_type_id' => ProjectType::where('name', 'loteamento_1fase')->first()->id, 'document_type_id' => DocumentType::where('name', 'solo')->first()->id],
            ['project_type_id' => ProjectType::where('name', 'loteamento_1fase')->first()->id, 'document_type_id' => DocumentType::where('name', 'licenca_ambiental')->first()->id],
            ['project_type_id' => ProjectType::where('name', 'loteamento_1fase')->first()->id, 'document_type_id' => DocumentType::where('name', 'vias_projeto')->first()->id],
            ['project_type_id' => ProjectType::where('name', 'loteamento_1fase')->first()->id, 'document_type_id' => DocumentType::where('name', 'vias_memorial_descritivo')->first()->id],

//            //Loteamento 2
            ['project_type_id' => ProjectType::where('name', 'loteamento_2fase')->first()->id, 'document_type_id' => DocumentType::where('name', 'guia_recolhimento')->first()->id],
            ['project_type_id' => ProjectType::where('name', 'loteamento_2fase')->first()->id, 'document_type_id' => DocumentType::where('name', 'art_rrt')->first()->id],
            ['project_type_id' => ProjectType::where('name', 'loteamento_2fase')->first()->id, 'document_type_id' => DocumentType::where('name', 'martricula_imovel')->first()->id],
            ['project_type_id' => ProjectType::where('name', 'loteamento_2fase')->first()->id, 'document_type_id' => DocumentType::where('name', 'aprovacao_tecnico')->first()->id],
            ['project_type_id' => ProjectType::where('name', 'loteamento_2fase')->first()->id, 'document_type_id' => DocumentType::where('name', 'terras')->first()->id],
            ['project_type_id' => ProjectType::where('name', 'loteamento_2fase')->first()->id, 'document_type_id' => DocumentType::where('name', 'microdrenagem')->first()->id],
            ['project_type_id' => ProjectType::where('name', 'loteamento_2fase')->first()->id, 'document_type_id' => DocumentType::where('name', 'esgoto')->first()->id],
            ['project_type_id' => ProjectType::where('name', 'loteamento_2fase')->first()->id, 'document_type_id' => DocumentType::where('name', 'pavimentacao')->first()->id],
            ['project_type_id' => ProjectType::where('name', 'loteamento_2fase')->first()->id, 'document_type_id' => DocumentType::where('name', 'agua')->first()->id],
            ['project_type_id' => ProjectType::where('name', 'loteamento_2fase')->first()->id, 'document_type_id' => DocumentType::where('name', 'energia')->first()->id],
            ['project_type_id' => ProjectType::where('name', 'loteamento_2fase')->first()->id, 'document_type_id' => DocumentType::where('name', 'termo_aprovacao')->first()->id],
            ['project_type_id' => ProjectType::where('name', 'loteamento_2fase')->first()->id, 'document_type_id' => DocumentType::where('name', 'cronograma')->first()->id],
            ['project_type_id' => ProjectType::where('name', 'loteamento_2fase')->first()->id, 'document_type_id' => DocumentType::where('name', 'licenca_ambiental')->first()->id],
//            //Regularização

            ['project_type_id' => ProjectType::where('name', 'construcao_regularizacao')->first()->id, 'document_type_id' => DocumentType::where('name', 'guia_recolhimento')->first()->id],
            ['project_type_id' => ProjectType::where('name', 'construcao_regularizacao')->first()->id, 'document_type_id' => DocumentType::where('name', 'plantas')->first()->id],
            ['project_type_id' => ProjectType::where('name', 'construcao_regularizacao')->first()->id, 'document_type_id' => DocumentType::where('name', 'art_rrt')->first()->id],
            ['project_type_id' => ProjectType::where('name', 'construcao_regularizacao')->first()->id, 'document_type_id' => DocumentType::where('name', 'martricula_imovel')->first()->id],
            ['project_type_id' => ProjectType::where('name', 'construcao_regularizacao')->first()->id, 'document_type_id' => DocumentType::where('name', 'laudo_vistoria')->first()->id],
            ['project_type_id' => ProjectType::where('name', 'construcao_regularizacao')->first()->id, 'document_type_id' => DocumentType::where('name', 'memorial_descritivo_atividade')->first()->id],
            ['project_type_id' => ProjectType::where('name', 'construcao_regularizacao')->first()->id, 'document_type_id' => DocumentType::where('name', 'laudo_efluentes')->first()->id],
            ['project_type_id' => ProjectType::where('name', 'construcao_regularizacao')->first()->id, 'document_type_id' => DocumentType::where('name', 'ppci_alvara')->first()->id],
            ['project_type_id' => ProjectType::where('name', 'construcao_regularizacao')->first()->id, 'document_type_id' => DocumentType::where('name', 'licenca_fepam')->first()->id],
            ['project_type_id' => ProjectType::where('name', 'construcao_regularizacao')->first()->id, 'document_type_id' => DocumentType::where('name', 'alvara_sanitaria')->first()->id],

//            //Desdobro
            ['project_type_id' => ProjectType::where('name', 'lotes_desmembramento_remembramento')->first()->id, 'document_type_id' => DocumentType::where('name', 'guia_recolhimento')->first()->id],
            ['project_type_id' => ProjectType::where('name', 'lotes_desmembramento_remembramento')->first()->id, 'document_type_id' => DocumentType::where('name', 'vias_memorial_descritivo')->first()->id],
            ['project_type_id' => ProjectType::where('name', 'lotes_desmembramento_remembramento')->first()->id, 'document_type_id' => DocumentType::where('name', 'plantas')->first()->id],
            ['project_type_id' => ProjectType::where('name', 'lotes_desmembramento_remembramento')->first()->id, 'document_type_id' => DocumentType::where('name', 'art_rrt')->first()->id],
            ['project_type_id' => ProjectType::where('name', 'lotes_desmembramento_remembramento')->first()->id, 'document_type_id' => DocumentType::where('name', 'martricula_imovel')->first()->id],

//            //Habite-se
            ['project_type_id' => ProjectType::where('name', 'certidao_habitese')->first()->id, 'document_type_id' => DocumentType::where('name', 'guia_recolhimento')->first()->id],
            ['project_type_id' => ProjectType::where('name', 'certidao_habitese')->first()->id, 'document_type_id' => DocumentType::where('name', 'alvara_construcao')->first()->id],
            ['project_type_id' => ProjectType::where('name', 'certidao_habitese')->first()->id, 'document_type_id' => DocumentType::where('name', 'martricula_imovel')->first()->id],
            ['project_type_id' => ProjectType::where('name', 'certidao_habitese')->first()->id, 'document_type_id' => DocumentType::where('name', 'alvara_bombeiros')->first()->id],
            ['project_type_id' => ProjectType::where('name', 'certidao_habitese')->first()->id, 'document_type_id' => DocumentType::where('name', 'licenca_fepam')->first()->id],
            ['project_type_id' => ProjectType::where('name', 'certidao_habitese')->first()->id, 'document_type_id' => DocumentType::where('name', 'alvara_sanitaria')->first()->id],

//            //Tapumes
            ['project_type_id' => ProjectType::where('name', 'autorizacao_tapume')->first()->id, 'document_type_id' => DocumentType::where('name', 'guia_recolhimento')->first()->id],
            ['project_type_id' => ProjectType::where('name', 'autorizacao_tapume')->first()->id, 'document_type_id' => DocumentType::where('name', 'alvara_ou_autorizacao')->first()->id],

//            //Demolicao
            ['project_type_id' => ProjectType::where('name', 'autorizacao_demolicao')->first()->id, 'document_type_id' => DocumentType::where('name', 'guia_recolhimento')->first()->id],
            ['project_type_id' => ProjectType::where('name', 'autorizacao_demolicao')->first()->id, 'document_type_id' => DocumentType::where('name', 'croqui')->first()->id],
            ['project_type_id' => ProjectType::where('name', 'autorizacao_demolicao')->first()->id, 'document_type_id' => DocumentType::where('name', 'art_rrt')->first()->id],
            ['project_type_id' => ProjectType::where('name', 'autorizacao_demolicao')->first()->id, 'document_type_id' => DocumentType::where('name', 'martricula_imovel')->first()->id],

        ]);
    }
}
