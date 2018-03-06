@extends ('layouts.master')

@section ('title', 'Histórico do projeto')

@section ('content')
    <div class="row my-4">
        <div class="col-md-8 mx-auto">
            <h2 class="text-center">
                Histórico
            </h2>

            @if (count($events))
                <table class="mt-3 table table-bordered">
                    <thead>
                        <tr>
                            <th>Data</th>
                            <th>Situação</th>
                            <th>Descrição</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($events as $event)
                            <tr>
                                <td>{{ $event->created_at->format('j/m/Y') }}</td>
                                <td>{{ $event->eventType->description }}</td>
                                <td>{{ $event->description }}</td>
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
@endsection
