@extends ('layouts.master')

@section ('title', 'Histórico do projeto')

@section ('content')
    <div class="row my-4">
        <div class="col-md-8 mx-auto">
            <h2 class="text-center">
                Histórico
            </h2>

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
        </div>
    </div>
@endsection
