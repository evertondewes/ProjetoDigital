<?php

namespace ProjetoDigital\Http\Controllers;

use ProjetoDigital\Models\Project;
use Illuminate\Support\Facades\Storage;
use ProjetoDigital\Models\ProjectDocument;

class ProjectDocumentsController extends Controller
{
    public function index(Project $project)
    {
        $this->authorize('view', $project);

        return view('customer.projects.docs', compact('project'));
    }

    public function download(ProjectDocument $projectDocument)
    {
        $this->authorize('view', $projectDocument);

        return Storage::download($projectDocument->path, $projectDocument->name);
    }

    public function store(Project $project)
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
    }

    public function destroy(ProjectDocument $projectDocument)
    {
        $this->authorize('delete', $projectDocument);

        $projectDocument->delete();

        $this->alert('Arquivo excluído com sucesso!');

        return back();
    }
}
