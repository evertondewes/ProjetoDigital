@extends ('layouts.master')

@section ('title', 'Painel de controle')

@section ('sidebar')
    @include ('layouts.sidebar')
@endsection

@section ('content')
    <h2 class="text-center mt-4">
        <i class="fa fa-tachometer"></i> Painel de controle
    </h2>

    <div class="row mt-4">
        <div class="col-md-4 mb-3 mb-md-0">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <h4>
                        <i class="fa fa-users"></i> Usuários: {{ $count['users'] }}
                    </h4>
                </div>

                <div class="card-footer">
                    <a class="text-white" href="#">Ver detalhes</a>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3 mb-md-0">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <h4>
                        <i class="fa fa-file-text"></i> Solicitações: {{ $count['projects'] }}
                    </h4>
                </div>

                <div class="card-footer">
                    <a class="text-white" href="#">Ver detalhes</a>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3 mb-md-0">
            <div class="card bg-danger text-white">
                <div class="card-body">
                    <h4>
                        <i class="fa fa-address-card-o"></i> Contas pendentes: {{ $count['pending-accounts'] }}
                    </h4>
                </div>

                <div class="card-footer">
                    <a class="text-white" href="#">Ver detalhes</a>
                </div>
            </div>
        </div>
    </div>
@endsection
