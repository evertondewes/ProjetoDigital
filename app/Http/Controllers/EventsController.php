<?php

namespace ProjetoDigital\Http\Controllers;

use ProjetoDigital\Models\Event;
use ProjetoDigital\Models\Project;

class EventsController extends Controller
{
    public function index(Project $project)
    {
        $this->authorize('view', $project);

        return view('customer.events.index', [
            'project' => $project,
            'events' => $project->events->reverse() ,
        ]);
    }

    public function show(Event $event)
    {
        $this->authorize('view', $event);

        return view('customer.events.show', [
            'project' => $event->project,
            'event' => $event,
        ]);
    }
}
