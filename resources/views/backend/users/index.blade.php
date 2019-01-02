@extends ('layouts.master')

@section ('title', 'Listar usuários')

@section ('content')
    <div class="row mt-4">
        <div class="col-md-8 mx-auto">
            <div class="d-sm-flex align-items-center justify-content-between">
                <a id="filter-link" class="d-none" href="#"></a>

                <div class="custom-control custom-radio">
                    <input {{ $filter == 1 ? 'checked' : '' }} onclick="
                            $('#filter-link').attr('href', '{{ url()->current() }}?filter=1')[0].click()" type="radio" id="filter1" class="custom-control-input">
                    <label class="custom-control-label" for="filter1">Contas ativadas</label>
                </div>

                <div class="custom-control custom-radio">
                    <input {{ $filter == 0 ? 'checked' : '' }} onclick="
                            $('#filter-link').attr('href', '{{ url()->current() }}?filter=0')[0].click()" type="radio" id="filter2" value="0" class="custom-control-input">
                    <label class="custom-control-label" for="filter2">Contas desativadas</label>
                </div>

                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown">
                        {{ $role_selecionada->description ?? 'Tipo de Usuário:' }}
                    </button>

                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ url()->current() }}">Todos</a>
                        @foreach($roles as $role)
                            <a class="dropdown-item" href="{{ url()->current() }}?role={{ $role->id }}">
                                {{ $role->description }}
                            </a>
                        @endforeach
                    </div>
                </div>

                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown">
                        Ordenar por:
                    </button>

                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ url()->current() }}?by=id&filter={{ $filter }}">
                            Id
                        </a>
                        <a class="dropdown-item" href="{{ url()->current() }}?by=username&filter={{ $filter }}">
                            Nome de usuário
                        </a>
                        <a class="dropdown-item" href="{{ url()->current() }}?by=email&filter={{ $filter }}">
                            E-mail
                        </a>
                        <a class="dropdown-item" href="{{ url()->current() }}?order=desc&by=created_at&filter={{ $filter }}">
                            Mais recentes
                        </a>
                        <a class="dropdown-item" href="{{ url()->current() }}?order=asc&by=created_at&filter={{ $filter }}">
                            Mais antigos
                        </a>
                    </div>
                </div>
            </div>

            <table class="table table-bordered mt-3">
                <thead>
                    <tr class="text-center bg-light">
                        <td colspan="5">Usuários</td>
                    </tr>

                    <tr>
                        <th>Id</th>
                        <th>Nome de usuário</th>
                        <th>E-mail</th>
                        <th>Perfil</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>
                                <a href="/backend/users/{{ $user->id }}">{{ $user->username }}</a>
                            </td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role->description }}</td>
                            <td>{{ $user->isActive() ? 'Ativado' : 'Desativado' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="d-flex justify-content-center mt-4 mb-5">
                {{ $users->appends(['order' => $order, 'by' => $by, 'filter' => $filter])
                         ->links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>
    </div>
@endsection
