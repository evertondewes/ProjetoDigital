@extends ('layouts.master')

@section ('title', 'Adicionar conta')

@section ('content')
    <h2 class="text-center mt-4">
        Adicionar conta
    </h2>

    <div class="row my-4">
        <div class="col-md-6 mx-auto">
            @include ('layouts.status')

            <div class="card">
                <div class="card-header bg-white text-center">
                    {{ $person->name }}
                </div>

                <div class="card-body">
                    <form method="POST" action="/backend/people/{{ $person->id }}">
                        {{ csrf_field() }}

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

                        <div class="form-group">
                            <label for="access">Acesso:</label>
                            <select class="form-control" name="access" id="access">
                                @foreach ($roles->all() as $role)
                                    <option value="{{ $role->name }}">{{ $role->description }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary btn-custom">Adicionar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
