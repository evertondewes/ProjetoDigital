@extends ('profiles.layout')

@section ('profile-content')
    <h4 class="text-center mb-4">Dados pessoais</h4>

    <div class="form-group">
        <label for="name">Nome:</label>
        <input type="text" id="name" class="form-control" value="{{ $user->person->name }}" disabled>
    </div>

    <div class="form-row form-group">
        <div class="col-12 {{ $user->isEngineer() ? 'col-md-6' : 'col-md-12' }} mb-3 mb-md-0">
            <label for="cpf_cnpj">CPF / CNPJ:</label>
            <input type="text" id="cpf_cnpj" class="form-control" value="{{ $user->person->cpf_cnpj }}" disabled>
        </div>

        @if ($user->isEngineer())
            <div class="col-12 col-md-6">
                <label for="crea_cau">CREA / CAU:</label>
                <input type="text" id="crea_cau" class="form-control" value="{{ $user->person->crea_cau }}" disabled>
            </div>
        @endif
    </div>

    <div class="form-group">
        <label for="email">E-mail:</label>
        <input type="email" id="email" class="form-control" value="{{ $user->person->email }}" disabled>
    </div>

    <h4 class="text-center mb-4">Usuários</h4>

    <div class="form-group">
        <ul class="list-group">
            @foreach ($user->person->users as $usr)
                <li class="list-group-item">
                    {{ $usr->username }} ({{ $usr->role->description }})
                </li>
            @endforeach
        </ul>
    </div>

    <h4 class="text-center mb-4">Endereço</h4>

    <div class="form-row form-group">
        <div class="col-4 col-sm-3">
            <label for="number">Número:</label>
            <input type="text" id="number" class="form-control" value="{{ $user->person->address->number }}" disabled>
        </div>

        <div class="col-8 col-sm-9">
            <label for="street">Rua:</label>
            <input type="text" id="street" class="form-control" value="{{ $user->person->address->street }}" disabled>
        </div>
    </div>

    <div class="form-group">
        <label for="district">Bairro:</label>
        <input type="text" id="district" class="form-control" value="{{ $user->person->address->district }}" disabled>
    </div>

    <div class="form-row form-group">
        <div class="col-4 col-sm-3">
            <label for="state_id">Estado:</label>
            <input type="text" id="state_id" class="form-control" value="{{ $user->person->address->city->state->abbreviation }}" disabled>
        </div>

        <div class="col-8 col-sm-9">
            <label for="city_id">Cidade:</label>
            <input type="text" id="city_id" class="form-control" value="{{ $user->person->address->city->name }}" disabled>
        </div>
    </div>

    <h4 class="text-center mb-4">Telefone(s)</h4>

    <div class="form-group">
        <ul class="list-group">
            @foreach ($user->person->phoneNumbers as $phoneNumber)
                <li class="list-group-item">
                    ({{ $phoneNumber->area_code }}) {{ $phoneNumber->phone }}
                </li>
            @endforeach
        </ul>
    </div>
@endsection
