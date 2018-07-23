@extends ('layouts.master')

@section ('title', 'Documentos do projeto')

@section ('content')
    <div class="row my-4">
        <div class="col-md-12">
            @include ('layouts.status')

            <div class="card">
                <div class="card-header text-center">
                    Documentos da solicitação
                </div>

                <div class="card-body">
                        <div class="form-group">
                            <form method="POST" action="/project-docs/{{$project->project_type_id}}/{{$project->id}}" enctype="multipart/form-data">
                                {{ csrf_field() }}

                                @switch($project->project_type_id)
                                    @case(1)
                                        First case...
                                        @break

                                    @case(7)
                                        @include ('layouts.docs.tapume')
                                        @break

                                    @default
                                        <h3>Error durante a o cadastro do projeto</h3>
                                @endswitch
                                
                                <button type="submit" class="btn btn-primary btn-custom">
                                    Enviar
                                </button>
                            </form>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection
