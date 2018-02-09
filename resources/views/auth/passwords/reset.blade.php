@extends ('layouts.master')

@section ('title', 'Alteração de senha')

@section ('content')
    <div class="row mt-5">
        <div class="col-md-6 mx-auto">
            @include ('layouts.status')

            <div class="card">
                <div class="card-body">
                    <h4 class="text-center">Alterar senha</h4>

                    <form class="mt-4" method="POST" action="/password/reset">
                        {{ csrf_field() }}

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group">
                            <input type="email" class="form-control" name="email" placeholder="E-mail">
                        </div>

                        <div class="form-group">
                            <input type="password" class="form-control" name="password" placeholder="Nova senha">
                        </div>

                        <div class="form-group">
                            <input type="password" class="form-control" name="password_confirmation" placeholder="Confirme a nova senha">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-outline-info btn-custom">Alterar senha</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
