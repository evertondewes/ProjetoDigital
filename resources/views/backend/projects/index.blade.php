@extends ('layouts.master')

@section ('title', 'Listar projetos')

@section ('content')
    <div class="row mt-4">
        <div class="col-md-8 mx-auto">
            <table class="table table-bordered">
                <thead>
                    <tr class="text-center bg-light">
                        <td colspan="6">Solicitações</td>
                    </tr>

                    <tr>
                        <th>Id</th>
                        <th>Tipo</th>
                        <th>Requerente(s)</th>
                        <th>Situação</th>
                        <th>Ação</th>
                        <th>Aprovar</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($projects as $project)
                        <tr>
                            <td>{{ $project->id }}</td>
                            <td>
                                <a href="/backend/projects/{{ $project->id }}">
                                    {{ $project->projectType->description }}
                                </a>
                            </td>
                            <td>{{ implode(', ', $project->people->pluck('name')->all()) }}</td>
                            <td>{{ $project->lastEvent()->eventType->description ?? 'Em Análise' }}</td>
                            <td>
                                <a href="/backend/projects/{{ $project->id }}/events/create">
                                    Adicionar evento
                                </a>
                            </td>
                            <td><a href="/project-docs-approve/{{$project->id}}">Aprovar</a></td>

                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="d-flex justify-content-center mt-4 mb-5">
                {{ $projects->links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>
    </div>
@endsection
