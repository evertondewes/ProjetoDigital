@extends ('layouts.master')

@section ('title', 'Histórico do projeto')

@section ('content')
    <div class="row my-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">
                    Histórico
                </div>

                <div class="card-body">
                    @if (count($events))
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Data</th>
                                <th>Situação</th>
                                <th>Descrição</th>
                                <th>Ação</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach ($events as $event)
                                <tr>
                                    <td>{{ $event->created_at->format('j/m/Y') }}</td>
                                    <td>{{ $event->eventType->description }}</td>
                                    <td>{{ $event->description }}</td>
                                    <td>
                                        <a href="/events/{{ $event->id }}">Ver detalhes</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <p class="alert alert-warning text-center mt-3">
                            Não há nenhum evento associado à essa solicitação
                        </p>
                    @endif
                </div>
            </div>
        </div>

        @include ('customer.projects.menu')
    </div>
@endsection
