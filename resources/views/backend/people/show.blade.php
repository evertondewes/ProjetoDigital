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


                        <strong>Usuários: </strong>

                        <ul>
                            @foreach ($person->users as $user)
                                <li>{{ $user->username }} - ({{ $user->role->description }})</li>
                            @endforeach
                        </ul>

                        <strong>Telefones: </strong>

                        <ul>
                            @foreach ($person->phoneNumbers as $phone)
                                <li>({{ $phone->area_code }}) {{ $phone->phone }}</li>
                            @endforeach
                        </ul>

                        @can ('create', $person->users()->first())
                            <a class="btn btn-outline-primary btn-custom" href="/backend/people/{{ $person->id }}/add-user">
                                Adicionar conta
                            </a>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
