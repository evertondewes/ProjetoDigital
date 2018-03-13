<div class="col-md-4 order-first order-md-last mb-3 mb-md-0">
    <div class="card">
        <div class="card-header text-center">
            Opções
        </div>

        <div class="card-body p-0">
            <div class="list-group list-group-flush">
                <a href="/backend/projects/{{ $project->id }}" class="list-group-item">Ver detalhes</a>

                <a href="/backend/projects/{{ $project->id }}/events" class="list-group-item">
                    Eventos
                </a>

                <a href="/backend/projects/{{ $project->id }}/events/create" class="list-group-item">
                    Adicionar evento
                </a>

                <a href="#" class="list-group-item">Pagamentos</a>
            </div>
        </div>
    </div>
</div>
