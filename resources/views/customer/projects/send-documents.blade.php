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
                                        @include ('layouts.docs.nova')
                                        @break

                                    @case(2)
                                        @include ('layouts.docs.ampliacao')
                                        @break    
                                    
                                    @case(3)
                                        @include ('layouts.docs.reforma')
                                        @break

                                    @case(4)
                                        @include ('layouts.docs.loteamento1')
                                        @break    

                                    @case(5)
                                        @include ('layouts.docs.loteamento2')
                                        @break

                                    @case(6)
                                        @include ('layouts.docs.regularizacao')
                                        @break 

                                    @case(7)
                                        @include ('layouts.docs.remembramento')
                                        @break    
                                    
                                    @case(8)
                                        @include ('layouts.docs.tapume')
                                        @break

                                    @case(9)
                                        @include ('layouts.docs.tapume')
                                        @break    

                                    @case(10)
                                        @include ('layouts.docs.demolicao')
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
