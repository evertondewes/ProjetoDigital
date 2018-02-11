@extends ('layouts.master')

@section ('title', 'Exibir usuário')

@section ('content')
    <div class="row mt-4">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-body">
                    <h4 class="text-center">{{ $user->username }}</h4>

                    <div class="mt-4">
                        <p>
                            <strong>E-mail: </strong>{{ $user->email }}
                        </p>

                        <p>
                            <strong>Nome de usuário: </strong>{{ $user->username }}
                        </p>

                        <p>
                            <strong>Perfil: </strong>{{ $user->role->description }}
                        </p>

                        <p>
                            <strong>Status: </strong>{{ $user->isActive() ? 'Ativado' : 'Desativado' }}
                        </p>

                        @can ('update', $user)
                            <a class="btn btn-outline-primary btn-custom" href="/backend/users/{{ $user->id }}/edit">Editar</a>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
