    <table class="table">
        <thead>
            <tr>
                <th>Documento</th>
                <th>Download</th>
                @if($project->status_id == 4 && $project->technicalManager->id == Auth::user()->id)
                    <th>Substituir</th>
                @endif
            </tr>
        </thead>
        <tbody>
        @foreach ($project->events as $event)
            @foreach ($event->eventDocuments as $eventDocuments)
                <tr>

                    <td>
                        <a class="btn btn-primary btn-sm mt-1 mt-md-0" href="{{route('document.show', $eventDocuments) }}">
                            Download
                        </a>
                    </td>
                    <td>    

                    </td>
                </tr>
            @endforeach
            @endforeach
        </tbody>
    </table>
  
    
    
