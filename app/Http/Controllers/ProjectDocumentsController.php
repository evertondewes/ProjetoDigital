<?php

namespace ProjetoDigital\Http\Controllers;

use ProjetoDigital\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use ProjetoDigital\Models\ProjectDocument;
use ProjetoDigital\Models\ProjectType;
use Illuminate\Foundation\Http\FormRequest;

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

        return Storage::download($projectDocument->path, $projectDocument->name.'.pdf');
    }

    public function send(Project $project)
    {
        return view('customer.projects.send-documents', compact('project'));
    }

    public function store(Project $project ,Request $request)
    {      
        $this->authorize('update', $project);

        foreach ($project->projectType->checklists as $item) 
        {
            $request->validate([
                $item->name => 'mimes:pdf|max:10000'
            ]);
        }
       
        $folder = "public/projeto_".$project->id;

        foreach ($project->projectType->checklists as $item)
        {
            $name = $item->name;

            if (!is_null($request->$name)) 
            {
                $project->projectDocuments()->create([
                    'name' => $name,
                    'description' => $item->text,
                    'path' => $request->$name->storeAs($folder, $name.'.pdf')
                ]);
            }
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
        
        $aprovado = true;

        foreach ($project->projectDocuments as $doc) 
        {
           
        }

        // switch ($project->project_type_id)
        // {
        //     case '9':
        //         $aprovado = true;

        //         if ($request->guia_recolhimento == 1)
        //         {
        //             $project->projectDocuments()->where('project_id', $project->id)
        //                     ->where('name', 'guia_recolhimento')
        //                     ->update(['approved' => 1]);
        //         } 
        //         else
        //         {
        //             $project->projectDocuments()->where('project_id', $project->id)
        //                     ->where('name', 'guia_recolhimento')
        //                     ->update(['approved' => 0]);
        //             $aprovado = false;
        //         }

        //         if ($request->alvara_ou_autorizacao == 1)
        //         {
        //             $project->projectDocuments()->where('project_id', $project->id)
        //                     ->where('name', 'alvara_ou_autorizacao')
        //                     ->update(['approved' => 1]);
        //         } 
        //         else
        //         {
        //             $project->projectDocuments()->where('project_id', $project->id)
        //                     ->where('name', 'alvara_ou_autorizacao')
        //                     ->update(['approved' => 0]);
        //             $aprovado = false;
        //         }
                
        //         if ($aprovado)
        //         {
        //             $project->events()->create([
        //                 'description' => $request->description,
        //                 'event_type_id' => 1,
        //                 'project_id' => $project->id,
        //                 'user_id' => Auth::user()->id
        //             ]);
        //         }
        //         else
        //         {
        //             $project->events()->create([
        //                 'description' => $request->description,
        //                 'event_type_id' => 3,
        //                 'project_id' => $project->id,
        //                 'user_id' => Auth::user()->id
        //             ]);
        //         }
              
        //     break;
        
        //     default:
        //     break;

        // }

        return redirect('/backend/projects');
    }
}
