<?php

namespace ProjetoDigital\Http\Controllers\Backend;

use ProjetoDigital\Models\Event;
use ProjetoDigital\Models\EventDocument;
use ProjetoDigital\Models\Project;
use ProjetoDigital\Models\EventType;
use ProjetoDigital\Repositories\Rules;
use ProjetoDigital\Http\Controllers\Controller;

class EventsController extends Controller
{
    public function index(Project $project)
    {
        dd($project);
        return view('backend.events.index', [
            'project' => $project,
            'events' => $project->events()->latest()->get(),
        ]);
    }

    public function create(Project $project)
    {
        return view('backend.events.create', [
            'project' => $project,
            'eventTypes' => EventType::all(),
        ]);
    }

    public function store(Project $project, Rules $rules)
    {
        $this->validate(request(), $rules->table('events'));

        $event = $project->events()->create([
            'event_type_id' => request('event_type_id'),
            'description' => request('description'),
            'user_id' => auth()->id(),
        ]);

        foreach ((array) request()->file('event_documents') as $file) {
            $event->eventDocuments()->create([
                'name' => $file->getClientOriginalName(),
                'path' => $file->store('event_documents'),
            ]);
        }

        $this->alert('Evento cadastrado com sucesso!');

        return back();
    }

    public function show(Event $event)
    {
        return view('backend.events.show', [
            'event' => $event,
            'project' => $event->project,
        ]);
    }
}
