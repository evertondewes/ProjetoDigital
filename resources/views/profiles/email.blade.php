@extends ('profiles.layout')

@section ('profile-content')
    <form method="POST" action="/profile/email">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}

        <div class="form-group">
            <label for="email">E-mail:</label>
            <input type="email" id="email" class="form-control" name="email" value="{{ $user->person->email }}" disabled>
            <small class="form-text">
                <a href="#" onclick="
                    document.getElementById('email').disabled = false; this.style.display = 'none';">
                    Editar
                </a>
            </small>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-custom">Salvar</button>
        </div>
    </form>
@endsection
