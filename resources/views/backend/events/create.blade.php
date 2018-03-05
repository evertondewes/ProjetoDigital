@extends ('layouts.master')

@section ('title', 'Criar evento')

@section ('content')
    <h2 class="text-center mt-4">
        <i class="fa fa-pencil-square-o"></i> Cadastrar evento
    </h2>

    <div class="row my-4">
        <div class="col-md-8 mx-auto">
            @include ('layouts.status')

            <div class="card">
                <div class="card-header bg-white text-center">
                    Evento
                </div>

                <div class="card-body">
                    <form method="POST" action="/backend/projects/{{ $project->id }}/events">
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
                            <button type="submit" class="btn btn-primary btn-custom">
                                Cadastrar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
