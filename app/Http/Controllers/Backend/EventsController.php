<?php

namespace ProjetoDigital\Http\Controllers\Backend;

use ProjetoDigital\Models\Event;
use ProjetoDigital\Models\Project;
use ProjetoDigital\Models\EventType;
use ProjetoDigital\Http\Controllers\Controller;

class EventsController extends Controller
{
    public function index(Project $project)
    {
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

    public function store(Project $project)
    {
        $this->validate(request(), [
            'event_type_id' => 'required|numeric',
            'description' => 'required|string',
        ]);

        Event::create([
            'event_type_id' => request('event_type_id'),
            'description' => request('description'),
            'project_id' => $project->id,
            'user_id' => auth()->id(),
        ]);

        $this->alert('Evento cadastrado com sucesso!');

        return back();
    }

    public function show(Project $project, Event $event)
    {
        return view('backend.events.show', [
            'event' => $event,
            'project' => $project,
        ]);
    }
}
