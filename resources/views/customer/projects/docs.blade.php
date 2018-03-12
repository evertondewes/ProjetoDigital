@extends ('layouts.master')

@section ('title', 'Documentos do projeto')

@section ('content')
    <div class="row my-4">
        <div class="col-md-8">
            @include ('layouts.status')

            <div class="card">
                <div class="card-header bg-white text-center">
                    Anexos da solicitação
                </div>

                <div class="card-body">
                    @if (count($project->projectDocuments))
                        <table class="table">
                            <tbody>
                                @foreach ($project->projectDocuments as $projectDocument)
                                    <tr>
                                        <th>{{ $projectDocument->name }}</th>
                                        <td class="text-right">
                                            <a class="btn btn-success btn-sm" href="/project-docs/{{ $projectDocument->id }}">
                                                Baixar
                                            </a>

                                            <a class="btn btn-danger btn-sm mt-1 mt-md-0" href="#"
                                               data-form-id="#doc-delete-form" data-toggle="modal" data-target="#are-you-sure-modal">
                                                Excluir
                                            </a>

                                            <form class="d-none" id="doc-delete-form" method="POST" action="/project-docs/{{ $projectDocument->id }}">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p class="alert alert-warning text-center">
                            Não há anexos disponíveis
                        </p>
                    @endif

                    <form method="POST" action="/projects/{{ $project->id }}/docs" enctype="multipart/form-data">
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
                    </form>
                </div>
            </div>
        </div>

        @include ('customer.projects.menu')
    </div>
@endsection
