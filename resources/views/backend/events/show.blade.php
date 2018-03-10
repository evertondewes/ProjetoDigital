@extends ('layouts.master')

@section ('title', 'Exibir evento')

@section ('content')
    <div class="row mt-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-white text-center">
                    Evento
                </div>

                <div class="card-body">
                    <p>
                        <strong>Tipo: </strong>{{ $event->eventType->description }}
                    </p>

                    <p>
                        <strong>Descrição: </strong>{{ $event->description }}
                    </p>

                    <p>
                        <strong>Usuário responsável: </strong>{{ $event->user->username }}
                    </p>

                    <p>
                        <strong>Projeto associado: </strong>{{ $event->project->id }}
                    </p>

                    <p>
                        <strong>Data de criação: </strong>{{ $event->created_at->format('j/m/Y') }}
                    </p>
                </div>
            </div>
        </div>

        @include ('backend.projects.menu')
    </div>
@endsection
