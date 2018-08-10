<?php

namespace ProjetoDigital\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProjectDocument extends Model
{
    use ModelTrait, SoftDeletes;

    protected $dates = ['deleted_at'];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public static function autorizacao_tapume($request,$project)
    {
        $request->validate([
            'guia_recolhimento' => 'mimes:pdf|max:10000',
            'alvara_ou_autorizacao' => 'mimes:pdf|max:10000',
        ]);

        $folder = "public/projeto_".$project->id;

        $project->projectDocuments()->create([
            'name' => 'guia_recolhimento',
            'description' => 'Requerimento e Guia de recolhimento paga',
            'path' => $request->guia_recolhimento->storeAs($folder, 'guia_recolhimento.pdf')
        ]);

        $project->projectDocuments()->create([
            'name' => 'alvara_ou_autorizacao',
            'description' => 'Alvará de Construção ou Autorização de Demolição',
            'path' => $request->alvara_ou_autorizacao->storeAs($folder, 'alvara_ou_autorizacao.pdf')
        ]);
    }
}
