@extends ('layouts.master')

@section ('title', 'Documentos do projeto')

@section ('content')
    <div class="row my-4">
        <div class="col-md-12">
            @include ('layouts.status')

            <div class="card" style="font-weight: bold;">
                <div class="card-header text-center">
                    Observações
                </div>

                <div class="card-body">
                    <ul>
                        <li>Os documentos devem estar no formato PDF</li>
                        <li>Documentos com multiplas folhas, como plantas baixas, devem ser juntadas em um arquivo unico</li>
                        <li>O tamanho máximo por arquivo é de 10mb</li>
                        {{-- <li>Caso seja maior é recomendo o uso de um otimizador de PDFs</li> --}}
                        <li>Todos os documentos deverão estar assinados pelo Proprietário/Requerente e pelo Ténico Responsável</li>
                        <li>Todos os processos deverão vir acompanhados de recibo de pagamento de protocolo e de requrimento (Quando for o caso)</li>
                        <li>Cópia da Matricula atualizada do imóvel com no máximo 30 dias</li>
                        <li>Nenuma obra (Construção, reconstrução, reforma, aumento ou demolição) poderá ser iniciada sem a prévia autorização do Município</li>
                        <li>Nenuma obra (Construção, reconstrução, reforma, aumento ou demolição) poderá abrir janelas a menos de 1,5 metros do terreno vizinho em paredes paralelas e a menos de 0,75 metros em paredes perpendiculares à divisa</li>
                        <li>Projetos de construção em imóveis marginais as rodovias estaduais e federais deverão observar a faixa <i>"non aedificandi"</i> e apresentar comprovação da aprovação de acesso à rodovia pelo DNIT ou DAER</li>
                    </ul>
                </div>
            </div>

            <div class="card">
                <div class="card-header text-center">
                    Documentos <b>Obrigatórios</b> da solicitação
                </div>

                <div class="card-body">
                        <div class="form-group">
                            <form method="POST" action="/project-docs/{{$project->id}}" enctype="multipart/form-data">
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
                                        @include ('layouts.docs.habitese')
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
