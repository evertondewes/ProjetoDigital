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
                                <input type="radio" name="{{$projectDocument->name}}"  class="teste" id="aprovado-{{$projectDocument->id}}" value="1" required>
                            </center>
                        </td>
                        <td class="table-danger">
                            <center>
                                <input type="radio" name="{{$projectDocument->name}}" id="reprovado-{{$projectDocument->id}}" value="0">
                            </center>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <hr>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="status_id" id="status1" value="2" required>
            <label class="form-check-label" for="status1">Indeferido</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="status_id" id="status2" value="3">
            <label class="form-check-label" for="status2">Documentação Pendente</label>
        </div>
        <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="status_id" id="status3" value="4">
              <label class="form-check-label" for="status3">Arguardando Vistoria</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="status_id" id="status4" value="1">
            <label class="form-check-label" for="status4">Autorizado</label>
        </div><hr>
        <div class="form-group">
            <label for="obs">Observação:</label>
            <textarea class="form-control" rows="8" name="obs" value="{{ old('obs') }}" required></textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-custom">Enviar</button>
        </div>
  </form>

  {{-- <script type="text/javascript">
        document.querySelector('[id^="reprovado-"]').onclick = function() {
            document.getElementById('status3').disabled = this.checked;
            document.getElementById('status4').disabled = this.checked;
        };

        document.querySelector('[id^="aprovado-"]').onchange = function() {
            document.getElementById('status3').disabled = !this.checked;
            document.getElementById('status4').disabled = !this.checked;
        };
  </script> --}}
    
    
