<div class="col-md-4">
    <div class="card">
        <div class="card-header text-center">
            Opções
        </div>

        <div class="card-body p-0">
            <div class="list-group list-group-flush">
                <a href="/projects/{{ $project->id }}" class="list-group-item">Ver detalhes</a>

                <a href="/projects/{{ $project->id }}/historic" class="list-group-item">
                    Histórico
                </a>

                @can ('update', $project)
                    <a href="/projects/{{ $project->id }}/edit" class="list-group-item">
                        Editar
                    </a>
                @endcan

                @can ('add-owner', $project)
                    <a href="/owners/add/{{ $project->id }}" class="list-group-item">
                        Adicionar cliente
                    </a>
                @endcan

                <a href="/projects/{{ $project->id }}/docs" class="list-group-item">Anexos</a>

                <a href="#" class="list-group-item">Pagamentos</a>

                @can ('delete', $project)
                    <a href="#" class="list-group-item text-danger" data-form-id="#delete-form" data-toggle="modal" data-target="#are-you-sure-modal">
                        Excluir
                    </a>

                    <form id="delete-form" class="d-none" method="POST" action="/projects/{{ $project->id }}">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                    </form>
                @endcan
            </div>
        </div>
    </div>
</div>
