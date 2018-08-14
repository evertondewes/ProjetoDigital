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
            @foreach ($project->projectDocuments as $projectDocument)
                <tr>
                    <td>
                        <a href="/project-docs-view/{{$project->id}}/{{$projectDocument->name}}" target="_blank">{{$projectDocument->description}}</a>
                    </td>
                    <td>
                        <a class="btn btn-primary btn-sm mt-1 mt-md-0" href="/project-docs/{{$projectDocument->id}}">
                            Download
                        </a>
                    </td>
                    <td>    
                        @if ($projectDocument->approved == 0 && $project->technicalManager->id == Auth::user()->id)
                            <a class="btn btn-success btn-sm mt-1 mt-md-0" href="/project-docs/edit/{{$projectDocument->id}}">
                                Substituir
                            </a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
  
    
    
