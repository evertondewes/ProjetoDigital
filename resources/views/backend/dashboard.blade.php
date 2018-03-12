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
                    <a class="text-white" href="/backend/users">Ver detalhes</a>
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
                    <a class="text-white" href="/backend/projects">Ver detalhes</a>
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
                    <a class="text-white" href="/backend/pending-accounts">Ver detalhes</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 mx-auto">
            @if (count($events))
                <h4 class="text-center mt-4">Seus últimos eventos</h4>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Situação</th>
                            <th>Projeto</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($events as $event)
                            <tr>
                                <td>{{ $event->eventType->description }}</td>
                                <td>{{ $event->project()->withTrashed()->first()->id }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p class="alert alert-warning text-center mt-3">
                    Seus últimos eventos serão exibidos aqui!
                </p>
            @endif
        </div>
    </div>
@endsection
