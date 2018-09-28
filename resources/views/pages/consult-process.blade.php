@extends ('layouts.master')

@section ('title', 'Consultar Projeto ou Solicitação')

@section ('content')
    <div class="row my-4">
        <div class="col-md-8 mx-auto">
            @include ('layouts.status')

            <div class="card">
                <div class="card-header text-center">
                    Consultar Projeto
                </div>

                <div class="card-body">
                    <h4 class="text-center">Consultar Projeto ou Solicitação</h4>

                    <form method="POST" action="/consult-process-result" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="id">Número:</label>
                            <input type="text" class="form-control" id="id" name="id" required>

                            <label for="access_key">Chave de Acesso:</label>
                            <input type="text" class="form-control" id="access_key" name="access_key" required>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-custom">Consultar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
