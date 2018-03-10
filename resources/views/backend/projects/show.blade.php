@extends ('layouts.master')

@section ('title', 'Exibir projeto')

@section ('content')
    <div class="row my-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-white text-center">
                    {{ $project->projectType->description }}
                </div>

                <div class="card-body">
                    <div>
                        <p>
                            <strong>Número: </strong>{{ $project->id }}
                        </p>

                        <p>
                            <strong>Solicitado em: </strong>{{ $project->created_at->format('j/m/Y') }}
                        </p>

                        <p>
                            <strong>Última atualização: </strong>
                            {{ $project->lastEvent()
                                ? $project->lastEvent()->updated_at->format('j/m/Y')
                                : $project->created_at->format('j/m/Y')
                            }}
                        </p>

                        <p>
                            <strong>Tipo: </strong>{{ $project->projectType->description }}
                        </p>

                        <p>
                            <strong>Descrição: </strong>{{ $project->description }}
                        </p>

                        <p>
                            <strong>Localização: </strong>
                            {{ $project->formattedAddress() }}
                        </p>

                        <p>
                            <strong>Área: </strong>{{ $project->address->area . ' m²' }}
                        </p>

                        <p>
                            <strong>Responsável Técnico: </strong>
                            {{ $project->technical_manager->person->name }}
                        </p>

                        <p>
                            <strong>CREA / CAU: </strong>
                            {{ $project->technical_manager->person->crea_cau }}
                        </p>

                        <p>
                            <strong>Cliente: </strong>
                            {{ $project->owner->name }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        @include ('backend.projects.menu')
    </div>
@endsection
