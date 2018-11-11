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

            <div class="card my-3">
                <div class="card-header text-center">
                    Anexos
                </div>

                <div class="card-body">

                        @include ('layouts.docs.view')

                </div>
            </div>
            @if (!is_null($events) && count($events))
                @foreach ($events as $event)
                <div class="card">
                    <div class="card-header text-center">
                        Evento
                    </div>

                    <div class="card-body">
                        @include ('layouts.events.info')
                    </div>
                </div>

                <div class="card my-3">
                    <div class="card-header text-center">
                        Anexos
                    </div>

                    <div class="card-body">

                            <table class="table">
                                <tbody>
                                @foreach ($event->eventDocuments as $document)
                                    <tr>
                                        <th>{{ $document->name }}</th>
                                        <td class="text-right">
                                            <a href="/event-docs/{{ $document->id }}" class="btn btn-success btn-sm">
                                                Baixar
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                    </div>
                </div>
                @endforeach
            @else
                <p class="alert alert-warning text-center">
                    Não há eventos disponíveis
                </p>
            @endif

        </div>

    </div>
@endsection
