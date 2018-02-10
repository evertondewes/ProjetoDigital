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
    </nav>
</div>
