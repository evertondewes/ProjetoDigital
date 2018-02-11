<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Projeto Digital | Restante do Cadastro</title>
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>
    <div class="container my-5">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <h4>Por favor, complete o seu cadastro para que possa ter acesso ao sistema</h4>

                <div class="card mt-3">
                    <div class="card-body">
                        <form method="POST" action="/backend/mandatory">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="name">Nome:</label>
                                <input type="text" id="name" class="form-control" name="name" value="{{ old('name') }}">
                            </div>

                            <div class="form-group">
                                <label for="cpf_cnpj">CPF:</label>
                                <input type="text" id="cpf_cnpj" class="form-control" name="cpf_cnpj" value="{{ old('cpf_cnpj') }}">
                            </div>

                            <div class="form-group">
                                <label for="crea_cau">CREA / CAU: <span class="text-muted">(Opcional)</span></label>
                                <input type="text" id="crea_cau" class="form-control" name="crea_cau" value="{{ old('crea_cau') }}">
                            </div>

                            <div class="form-group">
                                <label for="email">E-mail:</label>
                                <input type="email" id="email" class="form-control" name="email" value="{{ old('email') }}">
                            </div>

                            <div class="form-group">
                                <label for="password">Senha:</label>
                                <input type="password" id="password" class="form-control" name="password">
                                <small class="form-text text-muted">Crie uma nova senha</small>
                            </div>

                            <div class="form-group">
                                <label for="password_confirmation">Confirme a senha:</label>
                                <input type="password" id="password_confirmation" class="form-control" name="password_confirmation">
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-outline-primary btn-custom">
                                    Confirmar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="/js/app.js"></script>
</body>
</html>
