@extends ('layouts.master')

@section ('title', 'Exibir usuário')

@section ('content')
    <div class="row mt-4">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-header bg-white text-center">
                    {{ $user->username }}
                </div>

                <div class="card-body">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th>E-mail:</th>
                                <td>{{ $user->person->email }}</td>
                            </tr>
                            <tr>
                                <th>CPF / CNPJ:</th>
                                <td>
                                    <a href="/backend/people/{{ $user->person->id }}">
                                        {{ $user->person->cpf_cnpj }}
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <th>Nome de usuário:</th>
                                <td>{{ $user->username }}</td>
                            </tr>
                            <tr>
                                <th>Perfil:</th>
                                <td>{{ $user->role->description }}</td>
                            </tr>
                            <tr>
                                <th>Status:</th>
                                <td>{{ $user->isActive() ? 'Ativado' : 'Desativado' }}</td>
                            </tr>
                        </tbody>
                    </table>

                    <form id="activation-form" method="POST" action="/backend/users/{{ $user->id }}">
                        {{ csrf_field() }}

                        @if ($user->isActive())
                            @can ('delete', $user)
                                {{ method_field('DELETE') }}

                                <div class="form-group">
                                    <button type="submit" class="btn btn-outline-danger btn-custom" data-form-id="#activation-form" data-toggle="modal" data-target="#are-you-sure-modal">
                                        Desativar
                                    </button>
                                </div>
                            @endcan
                        @else
                            {{ method_field('PATCH') }}

                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-custom">
                                    Ativar
                                </button>
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
