@extends ('profiles.layout')

@section ('profile-content')
    <form method="POST" action="/profile/password">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}

        <div class="form-group">
            <label for="current_password">Senha atual:</label>
            <input type="password" id="current_password" class="form-control" name="current_password">
        </div>

        <hr>

        <div class="form-group">
            <label for="password">Nova senha:</label>
            <input type="password" id="password" class="form-control" name="password">
            <small class="form-text text-muted">Mínimo 6 caracteres</small>
        </div>

        <div class="form-group">
            <label for="password_confirmation">Confirme a nova senha:</label>
            <input type="password" id="password_confirmation" class="form-control" name="password_confirmation">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-custom">Salvar</button>
        </div>
    </form>
@endsection
