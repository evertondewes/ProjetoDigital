@extends ('layouts.master')

@section ('title', 'Criar usuário')

@section ('content')
    <div class="row my-4">
        <div class="col-md-8">
            @include ('layouts.status')

            <div class="card">
                <div class="card-header bg-white text-center">
                    {{ $full ? 'Conta completa' : 'Conta de acesso' }}
                </div>

                <div class="card-body">
                    <form method="POST" action="/backend/users">
                        {{ csrf_field() }}

                        @if ($full)
                            <div class="form-group">
                                <label for="name">Nome:</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
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
                                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                            </div>
                        @endif

                        <div class="form-group">
                            <label for="username">Nome de usuário:</label>
                            <input type="text" class="form-control" id="username" name="username" value="{{ old('username') }}">
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

                        @if ($full)
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
                        @endif

                        <div class="form-group">
                            <label for="access">Acesso:</label>
                            <select class="form-control" name="access" id="access">
                                @foreach ($roles->all() as $role)
                                    <option value="{{ $role->name }}">{{ $role->description }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-custom">Cadastrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-4 order-first order-md-last mb-3 mb-md-0">
            <div class="card">
                <div class="card-header bg-white text-center">
                    Cadastrar conta...
                </div>

                <div class="card-body p-0">
                    <div class="list-group list-group-flush">
                        <a href="{{ url()->current() }}" class="list-group-item">
                            Apenas de acesso
                        </a>

                        <a href="{{ url()->current() }}?account=full" class="list-group-item">
                            Completa
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section ('scripts')
    @parent

    <script src="/js/load-states-and-cities.js"></script>
@endsection
