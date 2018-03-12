@extends ('layouts.master')

@section ('title', 'Exibir evento')

@section ('content')
    <div class="row my-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-white text-center">
                    Evento
                </div>

                <div class="card-body">
                    @include ('layouts.events.info')
                </div>
            </div>

            <div class="card my-3">
                <div class="card-header bg-white text-center">
                    Anexos
                </div>

                <div class="card-body">
                    @if (count($event->eventDocuments))
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
                    @else
                        <p class="alert alert-warning text-center">
                            Não há anexos disponíveis
                        </p>
                    @endif
                </div>
            </div>
        </div>

        @include ('customer.projects.menu')
    </div>
@endsection
