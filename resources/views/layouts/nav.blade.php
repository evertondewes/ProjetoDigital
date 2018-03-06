<nav class="navbar navbar-expand navbar-light bg-white">
    <div class="container-fluid">
        <ul class="navbar-nav">
            <li class="nav-item sidebar-burger">
                <a class="nav-link" href="#">
                    <i class="fa fa-bars"></i>
                </a>
            </li>
        </ul>

        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ url()->previous() }}">
                    <i class="fa fa-arrow-left"></i> Voltar
                </a>
            </li>
        </ul>

        <ul class="navbar-nav ml-auto">
            @auth
                <li class="nav-item dropdown">
                    <a class="nav-link nav-custom-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ auth()->user()->username }} <span class="d-none d-md-inline">({{ auth()->user()->role->description }})</span>
                    </a>

                    <div class="dropdown-menu" aria-labelledby="dropdown01">
                        <a class="dropdown-item" href="#" onclick="event.preventDefault(); $('#logout-form').submit();">
                            <i class="fa fa-sign-out"></i> Sair
                        </a>
                        <form id="logout-form" class="d-none" method="POST" action="/logout">
                            {{ csrf_field() }}
                        </form>
                    </div>
                </li>
            @else
                <li class="nav-item">
                    <a class="btn btn-primary btn-custom" href="/login">Entrar</a>
                    <a class="btn btn-outline-primary btn-custom" href="/register">Cadastrar-se</a>
                </li>
            @endauth
        </ul>
    </div>
</nav>
