@extends ('layouts.master')

@section ('title', 'Entrar')

@section ('sidebar')
    @include ('layouts.sidebar')
@endsection

@section ('content')
    <div class="row mt-5">
        <div class="col-md-6 mx-auto">
            @include ('layouts.status')

            <div class="card">
                <div class="card-body">
                    <h4 class="text-center">Entrar</h4>

                    <form class="mt-4" method="POST" action="/login">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Nome de usuário" name="username">
                        </div>

                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Senha" name="password">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="text-uppercase btn btn-outline-primary btn-block btn-custom">
                                Entrar
                            </button>
                        </div>

                        <div class="form-group d-flex justify-content-between">
                            <a class="text-decoration-none" href="/register">Cadastrar-se</a>
                            <a class="text-info text-decoration-none" href="/password/reset">Esqueceu a senha?</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
