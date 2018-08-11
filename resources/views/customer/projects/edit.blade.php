@extends ('layouts.master')

@section ('title', 'Editar projeto')

@section ('content')
    <div class="row my-4">
        <div class="col-md-8">
            @include ('layouts.status')

            <div class="card">
                <div class="card-header text-center">
                    Editar solicitação
                </div>

                <div class="card-body">
                    <h4 class="text-center">Solicitação</h4>

                    <form id="edit-form" method="POST" action="/projects/{{ $project->id }}">
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

                        <h4 class="text-center">Localização</h4>

                        <div class="form-row form-group">
                            <div class="col-6">
                                <label for="number">Numero:</label>
                                <input type="text" id="number" class="form-control" name="number" value="{{ $project->address->number }}">
                            </div>

                            <div class="col-6">
                                <label for="street">Rua:</label>
                                <input type="text" id="street" class="form-control" name="street" value="{{ $project->address->street }}">
                            </div>

                        </div>

                       <div class="form-row form-group">
                            
                            <div class="col-6">
                                <label for="complement">Complemento:</label>
                                <input type="text" id="complement" class="form-control" name="complement" value="{{ $project->address->complement }}">
                            </div>
                            
                            <div class="col-6">
                                <label for="district">Bairro:</label>
                                <input type="text" id="district" class="form-control" name="district" value="{{ $project->address->district }}">
                            </div>        
                        </div>

                        <div class="form-group">
                            <label for="area">Área:</label>
                            <input type="number" id="area" class="form-control" name="area" value="{{ $project->address->area }}">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-custom" data-form-id="#edit-form" data-toggle="modal" data-target="#are-you-sure-modal">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        @include ('customer.projects.menu')
    </div>
@endsection
