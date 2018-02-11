<nav class="navbar navbar-light bg-light d-flex justify-content-center">
    <a class="navbar-brand" href="/backend/dashboard"><i class="fa fa-wrench"></i> Projeto Digital</a>
    <button type="button" class="close">
        <span>&times;</span>
    </button>
</nav>

<div id="sidebar-body">
    <nav class="list-group">
        <a href="/backend/dashboard" class="list-group-item list-group-item-action {{ request()->is('backend/dashboard') ? 'active' : '' }}">
            <i class="fa fa-tachometer"></i> Painel de controle
        </a>

        <a href="#collapseUsersOption" class="list-group-item list-group-item-action" data-toggle="collapse">
            <i class="fa fa-users"></i> Usuários
        </a>
        <div class="collapse" id="collapseUsersOption">
            <nav class="list-group">
                @can ('create', \ProjetoDigital\Models\User::class)
                    <a href="/backend/users/create" class="list-group-item list-group-item-action {{ request()->is('backend/users/create') ? 'active' : '' }}">
                        <i class="fa fa-pencil-square-o"></i> Cadastrar
                    </a>
                @endcan

                <a href="/backend/users" class="list-group-item list-group-item-action {{ request()->is('backend/users') ? 'active' : '' }}">
                    <i class="fa fa-list-alt"></i> Listar
                </a>
            </nav>
        </div>

        <a href="/backend/pending-accounts" class="list-group-item list-group-item-action {{ request()->is('backend/pending-accounts') ? 'active' : '' }}">
            <i class="fa fa-address-card-o"></i> Contas pendentes
        </a>
    </nav>
</div>