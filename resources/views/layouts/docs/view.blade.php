<table class="table">
    <thead>
    <tr>
        <th>ID</th>
        <th>Documento</th>

        <th>Aprovado</th>
        <th>Tipo</th>

        @if($project->technicalManager->id == Auth::user()->id)
            <th>Substituir</th>
        @endif
    </tr>
    </thead>
    <tbody>
    @foreach ($project->events->reverse() as $event)
        @foreach ($event->eventDocuments as $eventDocuments)
            <tr>
                <td>
                    <a data-toggle="collapse" href="#collapseDocmunets{{$eventDocuments->id}}" role="button"
                       aria-expanded="false" aria-controls="collapseExample">
                        {{$eventDocuments->id}}
                    </a>
                </td>
                <td>
                    <a href="{{route('eventDocument.show', $eventDocuments) }}"
                       target="_blank">{{$eventDocuments->name}}</a>
                </td>
                <td>
                    @if($eventDocuments->approved) 'Aprovado'; @endif
                </td>
                <td>
                    {{$eventDocuments->documentType->title}}
                </td>
                <td>
                    @if ($eventDocuments->approved == 0 && $project->technicalManager->id == Auth::user()->id)
                        <a class="btn btn-success btn-sm mt-1 mt-md-0"
                           href="/project-docs/edit/{{$eventDocuments->id}}">
                            Substituir
                        </a>
                    @endif

                </td>
            </tr>
            <tr  class="collapse" id="collapseDocmunets{{$eventDocuments->id}}">
                <td colspan="5">
                    <div>
                        <table class="table table-sm">
                            <thead>
                            <tr>
                                <th>Evento</th>
                                <th>Data</th>
                                <th>Descrição do Dococumento</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    {{$event->id}}
                                </td>
                                <td>
                                    {{$eventDocuments->created_at->format('d/m/Y')}}
                                </td>
                                <td>
                                    {{$eventDocuments->description}}
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </td>

            </tr>
        @endforeach
    @endforeach
    </tbody>
</table>
  
    
    
