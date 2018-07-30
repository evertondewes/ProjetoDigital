@extends ('layouts.master')

@section ('title', 'Criar projeto')

@section ('content')
    <div class="row my-4">
        <div class="col-md-8 mx-auto">
            @include ('layouts.status')

            <div class="card">
                <div class="card-header text-center">
                    Cadastrar
                </div>

                <div class="card-body">
                    <h4 class="text-center">Solicitação</h4>

                    <form method="POST" action="/projects" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="project_type_id">Tipo:</label>
                            <select class="form-control" name="project_type_id" id="project_type_id">
                               {{--  @foreach ($projectTypes as $projectType)
                                    <option value="{{ $projectType->id }}">
                                        {{ $projectType->description }}
                                    </option>
                                @endforeach --}}
                                <option value="7">Autorização de Tapume</option>
                                <option value="8">Autorização de Demolição</option>   
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="description">Descrição:</label>
                            <textarea class="form-control" id="description" name="description" value="{{ old('description') }}" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="cpf_cnpj">CPF / CNPJ (do requerente):</label>
                            <input type="text" class="form-control" id="cpf_cnpj" name="cpf_cnpj" value="{{ old('cpf_cnpj') }}" required>
                        </div>

                        <h4 class="text-center">Localização</h4>

                        <div class="form-row form-group">
                            <div class="col-6">
                                <label for="street">Rua:</label>
                                <input type="text" id="street" class="form-control" name="street" value="{{ old('street') }}" required>
                            </div>

                            <div class="col-6">
                                <label for="number">Número:</label>
                                <input type="text" id="number" class="form-control" name="number" value="{{ old('number') }}" required>
                            </div>

                            <div class="col-6">
                                <label for="complement">Complemento:</label>
                                <input type="text" id="complement" class="form-control" name="complement" value="{{ old('complement') }}">
                            </div>

                            <div class="col-6">
                                <label for="district">Bairro:</label>
                                <input type="text" id="district" class="form-control" name="district" value="{{ old('district') }}" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="area">Área:</label>
                            <input type="number" id="area" class="form-control" name="area" value="{{ old('area') }}" required>
                        </div>

                       {{--  <h4 class="text-center">Anexos</h4>
                        
                        <div class="form-group">
                            <label for="project_documents">Arquivos:</label>
                            <input type="file" id="project_documents" class="form-control" name="project_documents[]" multiple>
                        </div> --}}

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-custom">Avançar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
