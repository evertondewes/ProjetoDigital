@extends ('layouts.master')

@section ('title', 'Listar projetos')

@section ('content')
    <div class="row mt-4">
        <div class="col-md-12 mx-auto">
            @include ('layouts.status')

            <div class="card">
                <div class="card-header text-center">
                    Buscar
                </div>

                <div class="card-body">
                    <form  class="form-inline" method="POST" action="/projects/search">
                        {{ csrf_field() }}
                        <input style="width: 80%;" type="text" class="form-control mb-2 mr-sm-2" name=" search" placeholder="Buscar Projeto por Numero" required>
                        <button type="submit" class="btn btn-primary mb-2">Buscar</button>
                    </form>
                </div>
            </div>

            @if ($project)
                <table class="table table-bordered">
                    <thead>
                        <tr class="text-center bg-light">
                            <td colspan="8">Minhas solicitações</td>
                        </tr>

                        <tr>
                            <th>Nº</th>
                            <th>Requerente</th>
                            <th>Tipo</th>
                            <th>Solicitado em</th>
                            <th>Última atualização</th>
                            <th>Situação</th>
                        </tr>
                    </thead>

                    <tbody>
                       
                            <tr>
                                <td>{{ $project->id }}</td>
                                <td>{{ $project->people->first()->name }}</td>
                                <td>
                                    <a title="{{ $project->projectType->description }}" href="/projects/{{ $project->id }}">
                                        {{ $project->projectType->description }}
                                    </a>
                                </td>
                                <td>{{ $project->created_at->format('j/m/Y') }}</td>
                                <td>{{ $project->lastEvent()
                                        ? $project->lastEvent()->updated_at->format('j/m/Y')
                                        : $project->created_at->format('j/m/Y')
                                }}</td>
                                <td>{{ $project->status->description}}</td>
                            </tr>
                       
                    </tbody>
                </table>
            @else
                <br>
                <div class="alert alert-warning text-center">
                    Nenhum projeto corresponde a esse número!
                </div>
            @endif

           
        </div>
    </div>
@endsection
