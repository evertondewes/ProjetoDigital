@extends ('profiles.layout')

@section ('profile-content')
    <form method="POST" action="/profile/username">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}

        <div class="form-group">
            <label for="username">Nome de usuário:</label>
            <input type="text" id="username" class="form-control" name="username" value="{{ $user->username }}" disabled>
            <small class="form-text">
                <a href="#" onclick="
                    document.getElementById('username').disabled = false; this.style.display = 'none';">
                    Editar
                </a>
            </small>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-custom">Salvar</button>
        </div>
    </form>
@endsection
