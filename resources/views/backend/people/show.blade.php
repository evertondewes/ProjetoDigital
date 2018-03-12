@extends ('layouts.master')

@section ('title', 'Exibir pessoa')

@section ('content')
    <div class="row mt-4">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-header bg-white text-center">
                    {{ $person->name }}
                </div>

                <div class="card-body">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th>E-mail:</th>
                                <td>{{ $person->email }}</td>
                            </tr>
                            <tr>
                                <th>CPF / CNPJ:</th>
                                <td>{{ $person->cpf_cnpj }}</td>
                            </tr>

                            @if ($person->crea_cau)
                                <tr>
                                    <th>CREA / CAU:</th>
                                    <td>{{ $person->crea_cau }}</td>
                                </tr>
                            @endif

                            @if (count($person->users))
                                <tr>
                                    <th>Usuários:</th>
                                    <td>
                                        <ul class="p-0 m-0 list-unstyled">
                                            @foreach ($person->users as $user)
                                                <li>
                                                    <a href="/backend/users/{{ $user->id }}">
                                                        {{ $user->username }} ({{ $user->role->description }})
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </td>
                                </tr>
                            @endif

                            @if (count($person->phoneNumbers))
                                <tr>
                                    <th>Telefone(s): </th>
                                    <td>
                                        <ul class="p-0 m-0 list-unstyled">
                                            @foreach ($person->phoneNumbers as $phone)
                                                <li>({{ $phone->area_code }}) {{ $phone->phone }}</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                </tr>
                            @endif

                            @if (count($person->addresses))
                                <tr>
                                    <th>Endereço: </th>
                                    <td>{{ $person->formatted_address }}</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>

                    @can ('create', \ProjetoDigital\Models\User::class)
                        <p>
                            <a class="btn btn-outline-primary btn-custom" href="/backend/people/{{ $person->id }}/add-user">
                                Adicionar conta
                            </a>
                        </p>
                    @endcan
                </div>
            </div>
        </div>
    </div>
@endsection
