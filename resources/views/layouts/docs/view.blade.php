    <table class="table">
        <thead>
            <tr>
                <th>Documento</th>
                <th>Substituir</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($project->projectDocuments as $projectDocument)
                <tr>
                    <td>
                        <a href="/project-docs-view/{{$project->id}}/{{$projectDocument->name}}" target="_blank">{{$projectDocument->description}}</a>
                    </td>
                    <td>
                        <a class="btn btn-primary btn-sm mt-1 mt-md-0" href="#">
                            Substituir
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
  
    
    
