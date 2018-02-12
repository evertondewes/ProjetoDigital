@extends ('layouts.master')

@section ('title', 'Cadastro')

@section ('content')
    <div class="row my-5">
        <div class="col-md-6 mx-auto">
            @include ('layouts.status')

            <div class="card">
                <div class="card-body">
                    <h4 class="text-center">Cadastro</h4>

                    <form class="mt-4" method="POST" action="/register">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="name">Nome / Empresa:</label>
                            <input type="text" id="name" class="form-control" name="name" value="{{ old('name') }}">
                        </div>

                        <div class="form-group">
                            <label for="cpf_cnpj">CPF / CNPJ:</label>
                            <input type="text" id="cpf_cnpj" class="form-control" name="cpf_cnpj" value="{{ old('cpf_cnpj') }}">
                        </div>

                        <div class="form-group">
                            <label for="crea_cau">CREA / CAU: <span class="text-muted">(Para responsáveis técnicos)</span></label>
                            <input type="text" id="crea_cau" class="form-control" name="crea_cau" value="{{ old('crea_cau') }}">
                        </div>

                        <div class="form-group">
                            <label for="email">E-mail:</label>
                            <input type="email" id="email" class="form-control" name="email" value="{{ old('email') }}">
                        </div>

                        <div class="form-group">
                            <label for="username">Nome de usuário:</label>
                            <input type="text" id="username" class="form-control" name="username" value="{{ old('username') }}">
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
                            <button type="submit" class="btn btn-outline-primary btn-custom">
                                Confirmar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
