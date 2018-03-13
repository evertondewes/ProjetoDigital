@extends ('settings.layout')

@section ('settings-content')
    <form method="POST" action="/settings/email">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}

        <div id="password-form-group" class="form-group d-none">
            <label for="password">Senha:</label>
            <input type="password" id="password" class="form-control" name="password">
        </div>

        <div class="form-group">
            <label for="email">E-mail:</label>
            <input type="email" id="email" class="form-control" name="email" value="{{ $user->person->email }}" disabled>
            <small class="form-text">
                <a href="#" onclick="
                    $('#email').prop('disabled', false);
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
