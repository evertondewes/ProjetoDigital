@extends ('layouts.master')

@section ('title', 'Cadastro')

@section ('content')
    <div class="row my-5">
        <div class="col-md-8 col-lg-6 mx-auto">
            @include ('layouts.status')

            <div class="card">
                <div class="card-body">
                    <h4 class="text-center mb-4">Dados pessoais</h4>

                    <form method="POST" action="/register">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="name">Nome / Empresa:</label>
                            <input type="text" id="name" class="form-control" name="name" value="{{ old('name') }}">
                        </div>

                        <div class="form-row form-group">
                            <div class="col-12 col-md-6 mb-3 mb-md-0">
                                <label for="cpf_cnpj">CPF / CNPJ:</label>
                                <input type="text" id="cpf_cnpj" class="form-control" name="cpf_cnpj" value="{{ old('cpf_cnpj') }}">
                            </div>

                            <div class="col-12 col-md-6">
                                <label for="crea_cau">CREA / CAU: <span class="text-muted">(Opcional)</span></label>
                                <input type="text" id="crea_cau" class="form-control" name="crea_cau" value="{{ old('crea_cau') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email">E-mail:</label>
                            <input type="email" id="email" class="form-control" name="email" value="{{ old('email') }}">
                        </div>

                        <div class="form-group">
                            <label for="username">Nome de usuário:</label>
                            <input type="text" id="username" class="form-control" name="username" value="{{ old('username') }}">
                        </div>

                        <div class="form-row form-group">
                            <div class="col-6">
                                <label for="password">Senha:</label>
                                <input type="password" id="password" class="form-control" name="password">
                            </div>

                            <div class="col-6">
                                <label for="password_confirmation">Confirme a senha:</label>
                                <input type="password" id="password_confirmation" class="form-control" name="password_confirmation">
                            </div>
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
    </div>
@endsection

@section ('scripts')
    @parent

    <script src="/js/load-states-and-cities.js"></script>
@endsection
