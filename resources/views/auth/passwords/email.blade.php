@extends ('layouts.master')

@section ('title', 'Alteração de senha')

@section ('sidebar')
    @include ('layouts.sidebar')
@endsection

@section ('content')
    <div class="row mt-5">
        <div class="col-md-6 mx-auto">
            @include ('layouts.status')

            <div class="card">
                <div class="card-body">
                    <h4 class="text-center">Alteração de senha</h4>

                    <form class="mt-4" method="POST" action="/password/email">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <input type="email" class="form-control" name="email" placeholder="Endereço de e-mail">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-outline-info btn-custom">
                                Enviar link de alteração de senha
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
