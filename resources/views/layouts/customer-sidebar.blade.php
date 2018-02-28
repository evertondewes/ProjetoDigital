<nav class="navbar navbar-light bg-white d-flex justify-content-center">
    <a class="navbar-brand" href="/dashboard"><i class="fa fa-wrench"></i> Projeto Digital</a>
    <button type="button" class="close">
        <span>&times;</span>
    </button>
</nav>

<div id="sidebar-body">
    <nav class="list-group">
        <a href="/dashboard" class="list-group-item">
            <i class="fa fa-tachometer"></i> Painel de controle
        </a>

        <a href="#collapseUsersOption" class="list-group-item" data-toggle="collapse">
            <i class="fa fa-file-text"></i> Solicitações
        </a>
        <div class="collapse" id="collapseUsersOption">
            <nav class="list-group">
                @can ('create', \ProjetoDigital\Models\Project::class)
                    <a href="/projects/create" class="list-group-item">
                        <i class="fa fa-pencil-square-o"></i> Cadastrar
                    </a>
                @endcan

                <a href="/projects" class="list-group-item">
                    <i class="fa fa-list-alt"></i> Listar
                </a>
            </nav>
        </div>
    </nav>
</div>
