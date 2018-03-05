@extends ('layouts.master')

@section ('title', 'Listar projetos')

@section ('content')
    <div class="row mt-4">
        <div class="col-md-8 mx-auto">
            <h2 class="text-center">
                <i class="fa fa-list-alt"></i> Listar solicitações
            </h2>

            <table class="table table-bordered mt-3">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Tipo</th>
                        <th>Cliente</th>
                        <th>Situação</th>
                        <th>Ação</th>
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
                            <td>{{ $project->people()->first()->name }}</td>
                            <td>{{ $project->lastEvent()->description ?? 'Em Análise' }}</td>
                            <td>
                                <a href="/backend/projects/{{ $project->id }}/events/create">
                                    Adicionar evento
                                </a>
                            </td>
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
