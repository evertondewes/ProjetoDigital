<nav class="navbar navbar-light bg-light d-flex justify-content-center">
    <a class="navbar-brand" href="/">Projeto Digital</a>
    <button type="button" class="close">
        <span>&times;</span>
    </button>
</nav>

<div id="sidebar-body">
    <nav class="list-group">
        <a href="/" class="list-group-item list-group-item-action {{ request()->is('/') ? 'active' : '' }}">
            <i class="fa fa-home"></i> Início
        </a>

        <a href="/login" class="list-group-item list-group-item-action {{ request()->is('login') ? 'active' : '' }}">
            <i class="fa fa-sign-in"></i> Entrar
        </a>

        <a href="/register" class="list-group-item list-group-item-action {{ request()->is('register') ? 'active' : '' }}">
            <i class="fa fa-pencil-square-o"></i> Cadastrar-se
        </a>
    </nav>
</div>