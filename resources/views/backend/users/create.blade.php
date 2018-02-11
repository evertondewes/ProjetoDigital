@extends ('layouts.master')

@section ('title', 'Criar usuário')

@section ('content')
    <h2 class="text-center mt-4">
        <i class="fa fa-pencil-square-o"></i> Cadastrar usuário
    </h2>

    <div class="row mt-4">
        <div class="col-md-8">
            @include ('layouts.status')

            <form method="POST" action="/backend/users">
                {{ csrf_field() }}

                @if ($full)
                    <div class="form-group row">
                        <label for="name" class="col-sm-3 col-form-label text-right">Nome:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="cpf_cnpj" class="col-sm-3 col-form-label text-right">CPF:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="cpf_cnpj" name="cpf_cnpj" value="{{ old('cpf_cnpj') }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="crea_cau" class="col-sm-3 col-form-label text-right">CREA / CAU:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="crea_cau" name="crea_cau" value="{{ old('crea_cau') }}" placeholder="Opcional...">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-sm-3 col-form-label text-right">E-mail:</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                        </div>
                    </div>
                @endif

                <div class="form-group row">
                    <label for="username" class="col-sm-3 col-form-label text-right">Nome de usuário:</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="username" name="username" value="{{ old('username') }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-sm-3 col-form-label text-right">Senha:</label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password_confirmation" class="col-sm-3 col-form-label text-right">Confirme a senha:</label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="access" class="col-sm-3 col-form-label text-right">Acesso:</label>
                    <div class="col-sm-9">
                        <select class="form-control" name="access" id="access">
                            <option value="admin">Administrador</option>
                            <option value="secretario">Secretário de obras</option>
                            <option value="engenheiro">Engenheiro / Arquiteto</option>
                            <option value="estagiario">Estagiário</option>
                            <option value="engenheiro-cliente">Responsável técnico</option>
                            <option value="cliente">Cliente</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-9 ml-auto">
                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-primary text-center text-white py-2">
                    Cadastrar conta...
                </div>

                <div class="card-body p-0">
                    <div class="list-group list-group-flush">
                        <a href="{{ url()->current() }}" class="list-group-item list-group-item-action">
                            Apenas de acesso
                        </a>

                        <a href="{{ url()->current() }}?account=full" class="list-group-item list-group-item-action">
                            Completa
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
