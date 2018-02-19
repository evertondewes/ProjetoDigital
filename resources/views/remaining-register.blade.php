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

                @include ('layouts.status')

                <div class="card mt-3">
                    <div class="card-body">
                        <form method="POST" action="/mandatory">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="name">Nome / Empresa:</label>
                                <input type="text" id="name" class="form-control" name="name" value="{{ old('name') }}">
                            </div>

                            <div class="form-row form-group">
                                <div class="col-12 {{ auth()->user()->isEngineer() ? 'col-md-6' : 'col-md-12' }} mb-3 mb-md-0">
                                    <label for="cpf_cnpj">CPF / CNPJ:</label>
                                    <input type="text" id="cpf_cnpj" class="form-control" name="cpf_cnpj" value="{{ old('cpf_cnpj') }}">
                                </div>

                                @if (auth()->user()->isEngineer())
                                    <div class="col-12 col-md-6">
                                        <label for="crea_cau">CREA / CAU: <span class="text-muted">(Opcional)</span></label>
                                        <input type="text" id="crea_cau" class="form-control" name="crea_cau" value="{{ old('crea_cau') }}">
                                    </div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="email">E-mail:</label>
                                <input type="email" id="email" class="form-control" name="email" value="{{ old('email') }}">
                            </div>

                            <div class="form-row form-group">
                                <div class="col-6">
                                    <label for="password">Senha:</label>
                                    <input type="password" id="password" class="form-control" name="password">
                                    <small class="form-text text-muted">Crie uma nova senha</small>
                                </div>

                                <div class="col-6">
                                    <label for="password_confirmation">Confirme a senha:</label>
                                    <input type="password" id="password_confirmation" class="form-control" name="password_confirmation">
                                </div>
                            </div>

                            <div class="form-row form-group">
                                <div class="col-4 col-sm-3">
                                    <label for="number">Número:</label>
                                    <input type="text" id="number" class="form-control" name="number" value="{{ old('number') }}">
                                </div>

                                <div class="col-8 col-sm-9">
                                    <label for="street">Rua:</label>
                                    <input type="text" id="street" class="form-control" name="street" value="{{ old('street') }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="district">Bairro:</label>
                                <input type="text" id="district" class="form-control" name="district" value="{{ old('district') }}">
                            </div>

                            <div class="form-row form-group">
                                <div class="col-4 col-sm-3">
                                    <label for="state_id">Estado:</label>
                                    <select class="form-control" name="state_id" id="state_id"></select>
                                </div>

                                <div class="col-8 col-sm-9">
                                    <label for="city_id">Cidade:</label>
                                    <select class="form-control" name="city_id" id="city_id"></select>
                                </div>
                            </div>

                            <div class="form-row form-group">
                                <div class="col-4 col-sm-3">
                                    <label for="area_code">DDD:</label>
                                    <select class="form-control" name="area_code" id="area_code">
                                        @for ($i = 11; $i < 99; ++$i)
                                            <option {{ $i === 55 ? 'selected' : '' }} value="{{ $i }}">
                                                {{ $i }}
                                            </option>
                                        @endfor
                                    </select>
                                </div>

                                <div class="col-8 col-sm-9">
                                    <label for="phone">Telefone:</label>
                                    <input class="form-control" type="text" name="phone" id="phone" value="{{ old('phone') }}">
                                </div>
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

    <script>
        window.old = JSON.parse('{!! htmlspecialchars(json_encode(old()), ENT_NOQUOTES) !!}');
        window.appCity = '{{ env('CITY') }}';
    </script>

    <script src="/js/app.js"></script>

    <script src="/js/load-states-and-cities.js"></script>
</body>
</html>
