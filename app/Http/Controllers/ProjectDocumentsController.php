<?php

namespace ProjetoDigital\Http\Controllers;

use ProjetoDigital\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use ProjetoDigital\Models\ProjectDocument;


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

        switch ($project_type) {
            case '7':
                $request->validate([
                    'guia_recolhimento' => 'mimes:pdf|max:10000',
                    'plantas[]' => 'mimes:pdf|max:10000',
                ]);

                $folder = "projeto_".$project->id;

                $project->projectDocuments()->create([
                    'name' => 'guia_recolhimento',
                    'path' => $request->guia_recolhimento->storeAs($folder, 'guia_recolhimento.pdf'),
                ]);

                $i = 0;

                foreach ($request->plantas as $planta) 
                {
                    $project->projectDocuments()->create([
                        'name' => 'planta_baixa_'.$i,
                        'path' => $planta->storeAs($folder,'planta_baixa_'.$i.'.pdf'),
                    ]);
                    $i++;
                } 
               
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
}
