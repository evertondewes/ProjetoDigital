@extends ('layouts.master')

@section ('title', 'Cadastro')

@section ('content')
    <div class="row my-5">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-body">
                    <h4 class="text-center">Cadastro</h4>

                    <form class="mt-4" method="POST" action="/register">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="name">Nome:</label>
                            <input type="text" id="name" class="form-control" name="name">
                        </div>

                        <div class="form-group">
                            <label for="cpf">CPF:</label>
                            <input type="text" id="cpf" class="form-control" name="cpf">
                        </div>

                        <div class="form-group">
                            <label for="company">Empresa: <span class="text-muted">(Opcional)</span></label>
                            <input type="text" id="company" class="form-control" name="company">
                        </div>

                        <div class="form-group">
                            <label for="email">E-mail:</label>
                            <input type="email" id="email" class="form-control" name="email">
                        </div>

                        <div class="form-group">
                            <label for="username">Nome de usuário:</label>
                            <input type="text" id="username" class="form-control" name="username">
                        </div>

                        <div class="form-group">
                            <label for="password">Senha:</label>
                            <input type="password" id="password" class="form-control" name="password">
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation">Confirme a senha:</label>
                            <input type="password" id="password_confirmation" class="form-control" name="password_confirmation">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="text-uppercase btn btn-outline-primary btn-custom">
                                Cadastrar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
