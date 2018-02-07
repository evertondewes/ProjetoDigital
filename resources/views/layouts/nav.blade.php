<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/">Projeto Digital</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarDefault" aria-controls="navbarDefault">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarDefault">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
                    <a class="nav-link" href="/">Início</a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item {{ request()->is('login') ? 'active' : '' }}">
                    <a class="nav-link" href="/login">Entrar</a>
                </li>

                <li class="nav-item {{ request()->is('register') ? 'active' : '' }}">
                    <a class="nav-link" href="/register">Cadastrar-se</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

