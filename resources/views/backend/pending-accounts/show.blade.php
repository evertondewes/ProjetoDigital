@extends ('layouts.master')

@section ('title', 'Ativar conta')

@section ('content')
    <div class="row mt-4">
        <div class="col-md-6 mx-auto">
            <h2 class="text-center">Ativar conta</h2>

            <div class="card">
                <div class="card-body">
                    <p>
                        <strong>Nome: </strong>{{ $user->person->name }}
                    </p>

                    <p>
                        <strong>CPF / CNPJ: </strong>{{ $user->person->cpf_cnpj }}
                    </p>

                    <p>
                        <strong>CREA / CAU: </strong>{{ $user->person->crea_cau ?? 'Não cadastrado' }}
                    </p>

                    <p>
                        <strong>E-mail: </strong>{{ $user->person->email }}
                    </p>

                    <p>
                        <strong>Nome de usuário: </strong>{{ $user->username }}
                    </p>

                    <p>
                        <strong>Data de cadastro: </strong>{{ $user->created_at->format('j/m/Y') }}
                    </p>

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
