@extends ('layouts.master')

@section ('title', 'Exibir evento')

@section ('content')
    <div class="row mt-4">
        <div class="col-md-8">
            @include ('layouts.status')

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

                                        @can ('delete', $document)
                                            <a href="#" class="btn btn-danger btn-sm"
                                               data-form-id="#delete-doc-{{ $document->id }}-form" data-toggle="modal" data-target="#are-you-sure-modal">
                                                Excluir
                                            </a>

                                            <form class="d-none" id="delete-doc-{{ $document->id }}-form" method="POST" action="/backend/event-docs/{{ $document->id }}">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                            </form>
                                        @endcan
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

                    @can ('update', $event)
                        <form method="POST" action="/backend/events/{{ $event->id }}/docs" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="event_documents">Adicionar arquivos:</label>
                                <input type="file" id="event_documents" name="event_documents[]" class="form-control" multiple>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-custom">
                                    Adicionar
                                </button>
                            </div>
                        </form>
                    @endcan
                </div>
            </div>
        </div>

        @include ('backend.projects.menu')
    </div>
@endsection
