@extends ('layouts.master')

@section ('title', 'Exibir projeto')

@section ('content')
    <div class="row my-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">
                    {{ $project->projectType->description }}
                </div>

                <div class="card-body">
                    @include ('layouts.projects.info')
                </div>
            </div>
        </div>
        @include ('customer.projects.menu')

        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center">Eventos</div>
                <div class="card-body">
                    <table class="table table-sm">
                        <thead>
                        <tr>
                            <th>Nº</th>
                            <th>Data de criação</th>
                            <th>Tipo</th>
                            <th>Descrição</th>
                            <th>Usuário responsável</th>
                            <th>Documentos</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($project->events->reverse() as $event)
                            <tr>
                                <td>{{ $event->id }}</td>
                                <td>{{ $event->created_at->format('j/m/Y') }}</td>
                                <td>{{ $event->eventType->description }}</td>
                                <td>{{ $event->description }}</td>
                                <td>{{ $event->user->username }}</td>
                                <td>
                                    <a data-toggle="collapse" href="#collapseDocmunets{{$event->id}}" role="button"
                                       aria-expanded="false" aria-controls="collapseExample">
                                        Mostrar
                                    </a>
                                    <div class="collapse" id="collapseDocmunets{{$event->id}}">
                                        <table class="table table-sm">
                                            <thead>
                                            <tr>
                                                <th>Nome</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($event->eventDocuments as $eventDocuments)
                                                <tr>
                                                    <td>
                                                        <a class="btn btn-primary btn-sm mt-1 mt-md-0 btn btn-primary btn-sm"
                                                           href="{{route('eventDocument.show', $eventDocuments) }}">
                                                            {{ $eventDocuments->name }}
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
