<?php

namespace ProjetoDigital\Http\Controllers\Backend;

use Illuminate\Support\Facades\Storage;
use ProjetoDigital\Models\Event;
use ProjetoDigital\Models\EventDocument;
use ProjetoDigital\Http\Controllers\Controller;

class EventDocumentsController extends Controller
{
    public function store(Event $event)
    {
        $this->authorize('update', $event);

        $this->validate(request(), ['event_documents' => 'required']);

        foreach ((array) request()->file('event_documents') as $file) {
            $event->eventDocuments()->create([
                'name' => $file->getClientOriginalName(),
                'path' => $file->store('public/event_documents'),
            ]);
        }

        $this->alert('Arquivo(s) adicionado(s) com sucesso!');

        return back();
    }

    public function download(EventDocument $eventDocument)
    {
        $this->authorize('view', $eventDocument);

        return Storage::download($eventDocument->path, $eventDocument->name);
    }

    public function destroy(EventDocument $eventDocument)
    {
        $this->authorize('delete', $eventDocument);

        $eventDocument->delete();

        $this->alert('Arquivo excluído com sucesso!');

        return back();
    }
}
