    <div class="form-group">
        <label for="guia_recolhimento"><h3>1-Requerimento e Guia de recolhimento paga:</h3></label>
        <p>Requerimento específico dirigo ao Prefeito Municipal com guia de recolhimento paga</p>
        <input type="file" class="form-control"  name="guia_recolhimento" value="{{ old('guia_recolhimento') }}" required>
    </div>
    <hr>
    <div class="form-group">
        <label for="vias_memorial_descritivo"><h3>2-Vias do Memorial Descritivo da Obra</h3></label>
        <input type="file" class="form-control"  name="vias_memorial_descritivo" value="{{ old('vias_memorial_descritivo') }}" required>
    </div>
    <hr>
    <div class="form-group">
        <label for="plantas"><h3>3- Plantas Baixas</h3></label>
        <p>Uma via, em escala propriada <i>-formatação padrão ABNT-</i>, do Projeto Arquitetônico: Planta Baixa, Planta de Cobertura, Corte Longitudinal e Transversal, Fachadas, Planta da Situação/Localização; Planta Instalações Elétricas; Planta Instalações Hidrossanitárias com localização no Sistema de Tratamento de Esgoto</p>
        <input type="file" class="form-control"  name="plantas" value="{{ old('plantas') }}" required>
    </div>
    <hr>
    <div class="form-group">
        <label for="art_rrt"><h3>4-ART/RRT</h3></label>
        <p>Via da ART/RRT específica do responsável Técnico com comprovante de pagamento</p>
        <input type="file" class="form-control"  name="art_rrt" value="{{ old('art_rrt') }}" required>
    </div>
    <hr>
    <div class="form-group">
        <label for="martricula_imovel"><h3>5-Matrícula do Imóvel</h3></label>
        <p>Cópia atualizada da matrícula do imóvel em nome do requerente e contrato de compra e venda com autorização para construção em imóvel de terceiros autenticada em cartório se caso o imóvel não for em nome do requerente</p>
        <input type="file" class="form-control"  name="martricula_imovel" value="{{ old('martricula_imovel') }}" required>
    </div>
    <hr>
    <div class="card-header text-center">
        Documentos complementares: Edificações Comerciais/Serviços/Industriais/Institucionais/Multifamiliares
    </div>
    <div class="form-group">
        <label for="memorial_descritivo_atividade"><h3>6-Memorial Descritivo/Relatório de Atividades</h3></label>
        <p>Via do Memorial Descritivo/Relatório de Atividades com comprovação de atendimento dos requisitos dispostos nas legislações para a atividade</p>
        <input type="file" class="form-control"  name="memorial_descritivo_atividade" value="{{ old('memorial_descritivo_atividade') }}" >
    </div>
    <hr>
    <div class="form-group">
        <label for="tratamento_afluentes"><h3>7-Projeto de Tratamento de Efluentes</h3></label>
        <input type="file" class="form-control"  name="tratamento_afluentes" value="{{ old('tratamento_afluentes') }}" >
    </div>
    <hr>
    <div class="form-group">
        <label for="ppci"><h3>8-PPCI</h3></label>
        <p>Cópia do Certificado de Aprovação do PPCI emitido pelo Corpo de Bombeiros</p>
        <input type="file" class="form-control"  name="ppci" value="{{ old('ppci') }}" >
    </div>
    <hr>
    <div class="form-group">
        <label for="licenca_ambiental"><h3>9-Liçença Ambiental</h3></label>
        <p>Cópa da Licença Ambiental(Somente para indústrias e empreendimentos passíves de licenciamento ambiental)</p>
        <input type="file" class="form-control"  name="licenca_ambiental" value="{{ old('licenca_ambiental') }}" >
    </div>
    <hr>
    <div class="form-group">
        <label for="licencia_sanitaria"><h3>10-Licença da Vigilância Sanitária</h3></label>
        <p>Cópia da Licença da Vigilância Sanitária (somente para estabelecimentos de saúde, educação e outros onde houver manipulação ou consumo de alimentos)</p>
        <input type="file" class="form-control"  name="licencia_sanitaria" value="{{ old('licencia_sanitaria') }}">
    </div>
    <hr>

        
    @if ($errors->any())
        <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
        </div>
    @endif
  
