@extends ('layouts.master')

@section ('title', 'Exibir projeto')

@section ('content')
    <div class="row my-4">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-body">
                    <h4 class="text-center">
                        {{ $project->projectType->description }} - Nº {{ $project->id }}
                    </h4>

                    <div class="mt-4">
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
                            <strong>Cliente: </strong>
                            {{ $project->owner->person->name }}
                        </p>

                        <p>
                            <strong>CREA / CAU: </strong>
                            {{ $project->technical_manager->person->crea_cau }}
                        </p>

                        <a href="/projects/{{ $project->id }}/edit" class="btn btn-success btn-custom btn-block">Editar</a>
                        <a href="#" class="btn btn-success btn-custom btn-block">Histórico</a>
                        <a href="#" class="btn btn-success btn-custom btn-block">Pagamentos</a>
                        <a href="#" class="btn btn-success btn-custom btn-block">Anexos</a>

                        <form class="mt-2" method="POST" action="/projects/{{ $project->id }}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}

                            <button type="submit" class="btn btn-danger btn-custom btn-block">
                                Excluir
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection