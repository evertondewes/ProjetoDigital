@extends ('layouts.master')

@section ('title', 'Listar projetos')

@section ('content')
    <div class="row mt-4">
        <div class="col-md-12 mx-auto">
            @include ('layouts.status')

            @if (count($projects))
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
                        @foreach ($projects as $project)
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
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="alert alert-warning text-center">
                    Você não tem nenhuma solicitação cadastrada!
                </div>
            @endif

            <div class="d-flex justify-content-center mt-4 mb-5">
                {{ $projects->links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>
    </div>
@endsection
