<?php

namespace ProjetoDigital\Http\Controllers;

use ProjetoDigital\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use ProjetoDigital\Models\ProjectDocument;
use Auth;

class ProjectDocumentsController extends Controller
{
    public function index(Project $project)
    {
        $this->authorize('view', $project);

        return view('customer.projects.docs', compact('project'));
    }

    public function view($id,$projectDocument)
    {
        return response()->file(storage_path('app/public/projeto_'.$id.'/'.$projectDocument.'.pdf'));
    }

    public function download(ProjectDocument $projectDocument)
    {
        $this->authorize('view', $projectDocument);

        return Storage::download($projectDocument->path, $projectDocument->name);
    }

    /*public function store(Project $project)
    {
        $this->authorize('update', $project);

        $this->validate(request(), ['project_documents' => 'required']);

        foreach ((array) request()->file('project_documents') as $file) {
            $project->projectDocuments()->create([
                'name' => $file->getClientOriginalName(),
                'path' => $file->store('project_documents'),
            ]);
        }

        $this->alert('Arquivo(s) adicionado(s) com sucesso!');

        return back();
    }*/

    public function store($project_type, Project $project ,Request $request)
    {      
        $this->authorize('update', $project);

        switch ($project_type)
        {
            case '7':
                $request->validate([
                    'guia_recolhimento' => 'mimes:pdf|max:10000',
                    'alvara_ou_autorizacao' => 'mimes:pdf|max:10000',
                ]);

                $folder = "projeto_".$project->id;

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
               
            break;
        
            default:
            break;
        }

        $this->alert('Projeto criado com sucesso!');

        return redirect('/projects');
 
    }

    public function destroy(ProjectDocument $projectDocument)
    {
        $this->authorize('delete', $projectDocument);

        $projectDocument->delete();

        $this->alert('Arquivo excluído com sucesso!');

        return back();
    }

    public function analyze(Project $project)
    {
        return view('backend.projects.analyze', compact('project'));
    }

    public function approve(Project $project, Request $request)
    {
        switch ($project->project_type_id)
        {
            case '7':
                $aprovado = true;

                if ($request->guia_recolhimento == 1)
                {
                    $project->projectDocuments()->where('project_id', $project->id)
                            ->where('name', 'guia_recolhimento')
                            ->update(['approved' => 1]);
                } 
                else
                {
                    $project->projectDocuments()->where('project_id', $project->id)
                            ->where('name', 'guia_recolhimento')
                            ->update(['approved' => 0]);
                    $aprovado = false;
                }

                if ($request->alvara_ou_autorizacao == 1)
                {
                    $project->projectDocuments()->where('project_id', $project->id)
                            ->where('name', 'alvara_ou_autorizacao')
                            ->update(['approved' => 1]);
                } 
                else
                {
                    $project->projectDocuments()->where('project_id', $project->id)
                            ->where('name', 'alvara_ou_autorizacao')
                            ->update(['approved' => 0]);
                    $aprovado = false;
                }
                
                if ($aprovado)
                {
                    $project->events()->create([
                        'description' => $request->description,
                        'event_type_id' => 1,
                        'project_id' => $project->id,
                        'user_id' => Auth::user()->id
                    ]);
                }
                else
                {
                    $project->events()->create([
                        'description' => $request->description,
                        'event_type_id' => 3,
                        'project_id' => $project->id,
                        'user_id' => Auth::user()->id
                    ]);
                }
              
            break;
        
            default:
            break;

        }

        return redirect('/backend/projects');
    }
}
