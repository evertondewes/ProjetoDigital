@extends ('layouts.master')

@section ('title', 'Ativar conta')

@section ('content')
    <div class="row mt-4">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-header text-center">
                    Ativar conta
                </div>

                <div class="card-body">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th>Nome:</th>
                                <td>{{ $user->person->name }}</td>
                            </tr>
                            <tr>
                                <th>CPF / CNPJ:</th>
                                <td>{{ $user->person->cpf_cnpj }}</td>
                            </tr>
                            <tr>
                                <th>CREA / CAU:</th>
                                <td>{{ $user->person->crea_cau ?: 'Não cadastrado' }}</td>
                            </tr>
                            <tr>
                                <th>E-mail:</th>
                                <td>{{ $user->person->email }}</td>
                            </tr>
                            <tr>
                                <th>Nome de usuário:</th>
                                <td>{{ $user->username }}</td>
                            </tr>
                            <tr>
                                <th>Data de cadastro:</th>
                                <td>{{ $user->created_at->format('j/m/Y') }}</td>
                            </tr>
                        </tbody>
                    </table>

                    <form method="POST" action="/backend/pending-accounts/{{ $user->id }}">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}

                        <div class="form-group">
                            <button class="btn btn-success btn-custom" type="submit">
                                Ativar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
