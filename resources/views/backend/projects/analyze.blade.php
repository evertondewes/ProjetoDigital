@extends ('layouts.master')

@section ('title', 'Documentos do projeto')

@section ('content')
    <div class="row my-4">
        <div class="col-md-8">
            @include ('layouts.status')

            <div class="card">
                <div class="card-header text-center">
                    Anexos da solicitação
                </div>

                <div class="card-body">
                    @if (count($project->projectDocuments))
                        @include ('layouts.docs.approve')
                    @else
                        <p class="alert alert-warning text-center">
                            Não há anexos disponíveis
                        </p>
                    @endif
                </div>
            </div>
        </div>

        @include ('customer.projects.menu')
    </div>
@endsection
