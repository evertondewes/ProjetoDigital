@extends ('profiles.layout')

@section ('profile-content')
    <form method="POST" action="/profile/address">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}

        <div class="form-group text-center">
            <a href="#" onclick="
            $('[name]').each(function () {
                $(this).attr('disabled', false);
            });
            $('#state_id').val({{ $user->person->address->city->state->id }}).change();
            setTimeout(function () {$('#city_id').val({{ $user->person->address->city->id }})}, 100);
            $(this).hide();">
                Editar
            </a>
        </div>

        <div class="form-row form-group">
            <div class="col-4 col-sm-3">
                <label for="number">Número:</label>
                <input type="text" id="number" class="form-control" name="number" value="{{ $user->person->address->number }}" disabled>
            </div>

            <div class="col-8 col-sm-9">
                <label for="street">Rua:</label>
                <input type="text" id="street" class="form-control" name="street" value="{{ $user->person->address->street }}" disabled>
            </div>
        </div>

        <div class="form-group">
            <label for="district">Bairro:</label>
            <input type="text" id="district" class="form-control" name="district" value="{{ $user->person->address->district }}" disabled>
        </div>

        <div class="form-row form-group">
            <div class="col-4 col-sm-3">
                <label for="state_id">Estado:</label>
                <select class="form-control" name="state_id" id="state_id" disabled></select>
            </div>

            <div class="col-8 col-sm-9">
                <label for="city_id">Cidade:</label>
                <select class="form-control" name="city_id" id="city_id" disabled></select>
            </div>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-custom">Salvar</button>
        </div>
    </form>
@endsection

@section ('scripts')
    @parent

    <script src="/js/load-states-and-cities.js"></script>
@endsection
