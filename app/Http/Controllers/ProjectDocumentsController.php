<?php

namespace ProjetoDigital\Http\Controllers;

use ProjetoDigital\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use ProjetoDigital\Models\ProjectDocument;
use ProjetoDigital\Models\ProjectType;
use ProjetoDigital\Models\Event;
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
        $approved = true;

        foreach ($project->projectDocuments as $doc) 
        {
           $name = $doc->name;

            if ($request->$name == 1) 
            {
                ProjectDocument::analyze($project,$name,1);
            } else {
                ProjectDocument::analyze($project,$name,0);
            } 
        }

        Event::createEvent($project,7,$user_id,$obs);

        return redirect('/backend/projects');
    }
}
