@extends ('layouts.master')

@section ('title', 'Exibir pessoa')

@section ('content')
    <div class="row mt-4">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-body">
                    <h4 class="text-center">{{ $person->name }}</h4>

                    <div class="mt-4">
                        <p>
                            <strong>E-mail: </strong>{{ $person->email }}
                        </p>

                        <p>
                            <strong>CPF / CNPJ: </strong>{{ $person->cpf_cnpj }}
                        </p>

                        @if ($person->crea_cau)
                            <p>
                                <strong>CREA / CAU: </strong>{{ $person->crea_cau }}
                            </p>
                        @endif


                        @if (count($person->users))
                            <strong>Usuários: </strong>

                            <ul>
                                @foreach ($person->users as $user)
                                    <li>{{ $user->username }} - ({{ $user->role->description }})</li>
                                @endforeach
                            </ul>
                        @endif

                        @if (count($person->phoneNumbers))
                            <strong>Telefone(s): </strong>

                            <ul>
                                @foreach ($person->phoneNumbers as $phone)
                                    <li>({{ $phone->area_code }}) {{ $phone->phone }}</li>
                                @endforeach
                            </ul>
                        @endif

                        @if (count($person->addresses))
                            <p>
                                <strong>Endereço: </strong>

                                {{ $person->formatted_address }}
                            </p>
                        @endif

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
    </div>
@endsection
