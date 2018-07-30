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

                        @include ('layouts.docs.view')

                    @else
                        <p class="alert alert-warning text-center">
                            Não há anexos disponíveis
                        </p>
                    @endif

                   {{--  <form method="POST" action="/projects/{{ $project->id }}/docs" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        
                        <div class="form-group">
                            <label for="project_documents">Adicionar arquivos:</label>
                            <input type="file" id="project_documents" name="project_documents[]" class="form-control" multiple>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-custom">
                                Adicionar
                            </button>
                        </div>
                    </form> --}}
                </div>
            </div>
        </div>

        @include ('customer.projects.menu')
    </div>
@endsection
