@extends ('layouts.master')

@section ('title', 'Editar projeto')

@section ('content')
    <h2 class="text-center mt-4">
        <i class="fa fa-pencil-square-o"></i> Editar solicitação
    </h2>

    <div class="row my-4">
        <div class="col-md-8 mx-auto">
            @include ('layouts.status')

            <div class="card">
                <div class="card-body">
                    <h4 class="text-center">Solicitação</h4>

                    <form method="POST" action="/projects/{{ $project->id }}">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}

                        <div class="form-group">
                            <label for="project_type_id">Tipo:</label>
                            <select class="form-control" name="project_type_id" id="project_type_id">
                                @foreach ($projectTypes as $projectType)
                                    <option {{ $project->projectType->id === $projectType->id ? 'selected' : '' }} value="{{ $projectType->id }}">
                                        {{ $projectType->description }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="description">Descrição:</label>
                            <input type="text" class="form-control" id="description" name="description" value="{{ $project->description }}">
                        </div>

                        <div class="form-group">
                            <label for="username">Nome de usuário (do cliente):</label>
                            <input type="text" class="form-control" id="username" name="username" value="{{ $project->owner->username }}">
                        </div>

                        <h4 class="text-center">Localização</h4>

                        <div class="form-row form-group">
                            <div class="col-4 col-sm-3">
                                <label for="complement">Complemento:</label>
                                <input type="text" id="complement" class="form-control" name="complement" value="{{ $project->address->complement }}">
                            </div>

                            <div class="col-8 col-sm-9">
                                <label for="street">Rua:</label>
                                <input type="text" id="street" class="form-control" name="street" value="{{ $project->address->street }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="district">Bairro:</label>
                            <input type="text" id="district" class="form-control" name="district" value="{{ $project->address->district }}">
                        </div>

                        <div class="form-group">
                            <label for="area">Área:</label>
                            <input type="number" id="area" class="form-control" name="area" value="{{ $project->address->area }}">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-custom">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
