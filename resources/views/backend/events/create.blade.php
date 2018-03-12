@extends ('layouts.master')

@section ('title', 'Criar evento')

@section ('content')
    <div class="row my-4">
        <div class="col-md-8">
            @include ('layouts.status')

            <div class="card">
                <div class="card-header bg-white text-center">
                    Adicionar evento
                </div>

                <div class="card-body">
                    <form method="POST" action="/backend/projects/{{ $project->id }}/events" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="event_type_id">Tipo:</label>
                            <select class="form-control" name="event_type_id" id="event_type_id">
                                @foreach ($eventTypes as $eventType)
                                    <option value="{{ $eventType->id }}">
                                        {{ $eventType->description }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="description">Descrição:</label>
                            <input id="description" class="form-control" type="text" name="description" value="{{ old('description') }}">
                        </div>

                        <div class="form-group">
                            <label for="event_documents">Adicionar arquivos:</label>
                            <input type="file" id="event_documents" class="form-control" name="event_documents[]" multiple>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-custom">
                                Cadastrar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        @include ('backend.projects.menu')
    </div>
@endsection
