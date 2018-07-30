    <form method="POST" action="/project-docs-approve/{{$project->id}}">
        {{ csrf_field() }}
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Documento</th>
                    <th class="table-success"><center>Aprovar</center></th>
                    <th class="table-danger"><center>Reprovar</center></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($project->projectDocuments as $projectDocument)
                    <tr>
                        <td>
                            <a href="/project-docs-view/{{$project->id}}/{{$projectDocument->name}}" target="_blank">{{$projectDocument->description}}</a>
                        </td>
                        <td class="table-success">
                            <center>
                                <input type="radio" name="{{$projectDocument->name}}" value="1" required>
                            </center>
                        </td>
                        <td class="table-danger">
                            <center>
                                <input type="radio" name="{{$projectDocument->name}}" value="0">
                            </center>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="form-group">
            <label for="description">Comentário:</label>
            <textarea class="form-control" rows="5" name="description" value="{{ old('comentario') }}" required></textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-custom">Enviar</button>
        </div>
  </form>
    
    
