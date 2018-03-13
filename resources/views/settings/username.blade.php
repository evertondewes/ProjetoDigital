@extends ('settings.layout')

@section ('settings-content')
    <form method="POST" action="/settings/username">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}

        <div id="password-form-group" class="form-group d-none">
            <label for="password">Senha:</label>
            <input type="password" id="password" class="form-control" name="password">
        </div>

        <div class="form-group">
            <label for="username">Nome de usuário:</label>
            <input type="text" id="username" class="form-control" name="username" value="{{ $user->username }}" disabled>
            <small class="form-text">
                <a href="#" onclick="
                    $('#username').prop('disabled', false);
                    $('button[type=submit]').prop('disabled', false);
                    $('#password-form-group').removeClass('d-none').find('#password').focus();
                    $(this).hide();">
                    Editar
                </a>
            </small>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-custom" disabled>Salvar</button>
        </div>
    </form>
@endsection
