@extends ('layouts.master')

@section ('title', 'Listar eventos')

@section ('content')
    <div class="row mt-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-white text-center">
                    Listar eventos
                </div>

                <div class="card-body">
                    @if (count($events))
                        <table class="table table-bordered mt-3">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Tipo</th>
                                <th>Data</th>
                                <th>Usuário</th>
                                <th>Ação</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach ($events as $event)
                                <tr>
                                    <td>{{ $event->id }}</td>
                                    <td>{{ $event->eventType->description }}</td>
                                    <td>{{ $event->created_at->format('j/m/Y') }}</td>
                                    <td>{{ $event->user->username }}</td>
                                    <td>
                                        <a href="/backend/projects/{{ $project->id }}/events/{{ $event->id }}">
                                            Ver
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <p class="alert alert-warning text-center mt-3">
                            Essa solicitação não possui nenhum evento!
                        </p>
                    @endif
                </div>
            </div>
        </div>

        @include ('backend.projects.menu')
    </div>
@endsection
