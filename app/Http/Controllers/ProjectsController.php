<?php

namespace ProjetoDigital\Http\Controllers;

use Illuminate\Http\Request;
use ProjetoDigital\Facades\Cities;
use ProjetoDigital\Facades\People;
use ProjetoDigital\Models\Project;
use ProjetoDigital\Models\Person;
use ProjetoDigital\Models\Event;
use ProjetoDigital\Models\ProjectType;
use ProjetoDigital\Http\Requests\ProjectForm;
use Auth;
use Illuminate\Support\Facades\DB;

class ProjectsController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Project::class);
    }

    public function index(Request $request)
    {
        if(!is_null($request->search)) {
            $project = Project::find($request->search);
            if (!is_null($project)) {
                return redirect('/projects/'.$request->search);
            }
        }

        $queryProject = Project::query();

        $queryProject->orderBy('id','desc');

        if(!is_null($request->search)) {
            $queryProject->whereHas('people',function($q) use ($request){
                return $q->where('people.name', 'like', '%'.$request->search.'%');
            });
        }
        $user = auth()->user();

        if($user->isTechnicalManager()) {
            $queryProject->whereHas('users',function($q) use ($user){
                return $q->where('users.id', '=', $user->id);
            });
        }

        $projects = $queryProject->paginate(20);

        return view('customer.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('customer.projects.create', [
            'projectTypes' => ProjectType::all(),
        ]);
    }

    public function store(ProjectForm $form)
    {
        $project = $form->persist();

        session()->put('project_data', ['project' => $project, 'owner' => $form->only(['cpf_cnpj'])]);

        $event = Event::createEvent($project,7, Auth::user()->id,null);

        $owner = People::find($form->input('cpf_cnpj'));

        if (is_null($owner)) {

            session()->put('event_data', $event);

            return redirect('/owners/add');
        }

        $project->people()->attach($owner->id);

        return redirect('/project-docs/send/' . $project->id);
    }

    public function show(Project $project)
    {
        return view('customer.projects.show', compact('project'));
    }

    public function search(Request $request)
    {
        $project = Project::find($request->search);

        // if (is_null($project)) 
        // {
        //     $person = Person::where('name', 'like', "%{$request->search}%")->get();

        //     $projects = Project::whereHas('person', function ($query) use ($request) {
        //     $query->where('name', 'like', "%{$request->search}%");

        //     dd($projects);
        // });
        // }

        if ($project) {
            if ($project->technicalManager->id != Auth::user()->id) {
                $project = null;
            }
        }

        return view('customer.search-result', compact('project'));

    }

    public function edit(Project $project)
    {
        return view('customer.projects.edit', [
            'project' => $project,
            'projectTypes' => ProjectType::all(),
        ]);
    }

    public function update(Project $project, ProjectForm $form)
    {
        $form->update($project);

        Event::createEvent($project, 8, Auth::user()->id, null);

        $this->alert('Solicitação atualizada com sucesso!');

        return back();
    }

    public function destroy(Project $project)
    {
        $project->deletedBy(auth()->id())->delete();

        $this->alert('Solicitação excluída com sucesso!');

        return redirect('/projects');
    }
}
