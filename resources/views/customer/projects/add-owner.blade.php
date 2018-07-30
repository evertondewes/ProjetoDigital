@extends ('layouts.master')

@section ('title', 'Cadastrar dados do requerente')

@section ('content')
    <div class="row my-4">
        <div class="col-md-8 {{ is_null($project) ? 'mx-auto' : ''}}">
            @if (is_null($project))
                <h3 class="text-center mb-4">
                    O CPF / CNPJ fornecido ainda não está cadastrado no sistema.&nbsp;
                    Por favor, cadastre os dados pessoais do seu requerente para prosseguir.
                </h3>
            @endif

            @include ('layouts.status')

            <div class="card">
                @if (! is_null($project))
                    <div class="card-header text-center">
                        Adicionar requerente
                    </div>
                @endif

                <div class="card-body">
                    <form method="POST" action="{{ is_null($project) ? '/owners' : "/owners/{$project->id}" }}">
                        {{ csrf_field() }}

                        <h4 class="text-center mb-4">Dados pessoais</h4>

                        <div class="form-group">
                            <label for="name">Nome / Empresa:</label>
                            <input type="text" id="name" class="form-control" name="name" value="{{ old('name') }}">
                        </div>

                        <div class="form-group">
                            <label for="cpf_cnpj">CPF / CNPJ:</label>
                            <input type="text" id="cpf_cnpj" class="form-control" name="cpf_cnpj" value="{{ old('cpf_cnpj') ?: session('project_data')['owner']['cpf_cnpj'] }}">
                        </div>

                        <div class="form-group">
                            <label for="email">E-mail:</label>
                            <input type="email" id="email" class="form-control" name="email" value="{{ old('email') }}">
                        </div>

                        <h4 class="text-center mb-4">Endereço</h4>

                        <div class="form-row form-group">
                            <div class="col-4 col-sm-3">
                                <label for="number">Número:</label>
                                <input type="text" id="number" class="form-control" name="number" value="{{ old('number') }}">
                            </div>

                            <div class="col-8 col-sm-9">
                                <label for="street">Rua:</label>
                                <input type="text" id="street" class="form-control" name="street" value="{{ old('street') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="district">Bairro:</label>
                            <input type="text" id="district" class="form-control" name="district" value="{{ old('district') }}">
                        </div>

                        <div class="form-row form-group">
                            <div class="col-4 col-sm-3">
                                <label for="state_id">Estado:</label>
                                <select class="form-control" name="state_id" id="state_id"></select>
                            </div>

                            <div class="col-8 col-sm-9">
                                <label for="city_id">Cidade:</label>
                                <select class="form-control" name="city_id" id="city_id"></select>
                            </div>
                        </div>

                        <h4 class="text-center mb-4">Contato</h4>

                        <div class="form-row form-group">
                            <div class="col-4 col-sm-3">
                                <label for="area_code">DDD:</label>
                                <select class="form-control" name="area_code" id="area_code">
                                    @for ($i = 11; $i < 99; ++$i)
                                        <option {{ $i === 55 ? 'selected' : '' }} value="{{ $i }}">
                                            {{ $i }}
                                        </option>
                                    @endfor
                                </select>
                            </div>

                            <div class="col-8 col-sm-9">
                                <label for="phone">Telefone:</label>
                                <input class="form-control" type="text" name="phone" id="phone" value="{{ old('phone') }}" placeholder="Somente números.">
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-outline-primary btn-custom">
                                Confirmar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        @if (! is_null($project))
            @include ('customer.projects.menu')
        @endif
    </div>
@endsection

@section ('scripts')
    @parent

    <script src="/js/load-states-and-cities.js"></script>
@endsection
