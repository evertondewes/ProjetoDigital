@extends ('layouts.master')

@section ('title', 'Documentos do projeto')

@section ('content')
    <div class="row my-4">
        <div class="col-md-8">
            @include ('layouts.status')

            <div class="card">
                <div class="card-header text-center">
                    Documentos da Solicitação
                </div>
                <div class="card-body">
                    @if (count($project->events))
                        @include ('layouts.docs.view')
                    @else
                        <p class="alert alert-warning text-center">
                            Não há anexos disponíveis <br>
                            <a href="/project-docs/send/{{$project->id}}">Clique aqui para anexar os arquivos
                                necesários</a>
                        </p>
                    @endif
                </div>
            </div>
        </div>

        @include ('customer.projects.menu')
    </div>
@endsection
