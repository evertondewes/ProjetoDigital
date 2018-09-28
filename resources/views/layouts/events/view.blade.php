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
            @foreach ($event->eventDocuments as $eventDocument)

                <?php
                //dd($document);
                ?>
                <tr>
                    <td>
                        <a href="/project-docs-view/{{$eventDocument->id}}" target="_blank">{{$eventDocument->name }} {{$eventDocument->document}}</a>
                    </td>
                    <td>
                        <a class="btn btn-primary btn-sm mt-1 mt-md-0" href="{{route('eventDocument.show', $eventDocument) }}">
                            Download
                        </a>
                    </td>
                    <td>    
                        @if ($eventDocument->approved == 0 && $project->technicalManager->id == Auth::user()->id)
                            <a class="btn btn-success btn-sm mt-1 mt-md-0" href="/project-docs/edit/{{$eventDocument->id}}">
                                Substituir
                            </a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
  
    
    
