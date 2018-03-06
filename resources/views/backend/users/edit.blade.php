@extends ('layouts.master')

@section ('title', 'Editar usuário')

@section ('content')
    <div class="row mt-4">
        <div class="col-md-6 mx-auto">
            @include ('layouts.status')

            <div class="card">
                <div class="card-body">
                    <h4 class="text-center">Editar usuário</h4>

                    <form id="edit-form" class="mt-4" method="POST" action="/backend/users/{{ $user->id }}">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}

                        <div class="form-group">
                            <label for="username">Nome de usuário:</label>
                            <input type="text" id="username" class="form-control" name="username" value="{{ $user->username }}">
                        </div>

                        <div class="custom-control custom-checkbox form-group">
                            <input {{ $user->isActive() ? 'checked' : '' }} type="checkbox" class="custom-control-input" name="active" id="customCheck1">
                            <label class="custom-control-label" for="customCheck1">Ativado</label>
                        </div>

                        <div class="form-group">
                            <button type="button" class="btn btn-outline-primary btn-custom" data-form-id="#edit-form" data-toggle="modal" data-target="#are-you-sure-modal">
                                Confirmar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @include ('layouts.are-you-sure')
@endsection

@section ('scripts')
    @parent

    <script src="/js/are-you-sure.js"></script>
@endsection
