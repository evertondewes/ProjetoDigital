@extends ('layouts.master')

@section ('title', 'Exibir evento')

@section ('content')
    <div class="row mt-4">
        <div class="col-md-6 mx-auto">
            <div class="card card-body">
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
@endsection
