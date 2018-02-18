@extends ('layouts.master')

@section ('title', 'Criar usuário')

@section ('content')
    <h2 class="text-center mt-4">
        <i class="fa fa-pencil-square-o"></i> Cadastrar usuário
    </h2>

    <div class="row my-4">
        <div class="col-md-8">
            @include ('layouts.status')

            <div class="card">
                <div class="card-header bg-white text-center">
                    {{ $full ? 'Conta completa' : 'Conta de acesso' }}
                </div>

                <div class="card-body">
                    <form method="POST" action="/backend/users">
                        {{ csrf_field() }}

                        @if ($full)
                            <div class="form-group">
                                <label for="name">Nome:</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                            </div>

                            <div class="form-group">
                                <label for="cpf_cnpj">CPF:</label>
                                <input type="text" class="form-control" id="cpf_cnpj" name="cpf_cnpj" value="{{ old('cpf_cnpj') }}">
                            </div>

                            <div class="form-group">
                                <label for="crea_cau">CREA / CAU:</label>
                                <input type="text" class="form-control" id="crea_cau" name="crea_cau" value="{{ old('crea_cau') }}" placeholder="Opcional...">
                            </div>

                            <div class="form-group">
                                <label for="email">E-mail:</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                            </div>
                        @endif

                        <div class="form-group">
                            <label for="username">Nome de usuário:</label>
                            <input type="text" class="form-control" id="username" name="username" value="{{ old('username') }}">
                        </div>

                        <div class="form-group">
                            <label for="password">Senha:</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation">Confirme a senha:</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                        </div>

                        <div class="form-group">
                            <label for="access">Acesso:</label>
                            <select class="form-control" name="access" id="access">
                                @foreach ($roles as $role)
                                    <option value="{{ $role->name }}">{{ $role->description }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Cadastrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-white text-center">
                    Cadastrar conta...
                </div>

                <div class="card-body p-0">
                    <div class="list-group list-group-flush">
                        <a href="{{ url()->current() }}" class="list-group-item">
                            Apenas de acesso
                        </a>

                        <a href="{{ url()->current() }}?account=full" class="list-group-item">
                            Completa
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
