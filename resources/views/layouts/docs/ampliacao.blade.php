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
        <label for="plantas"><h3>3-Plantas Baixas</h3></label>
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
    <div class="form-group">
        <label for="laudo"><h3>6-Laudo de Vistoria</h3></label>
        <p>Laudo de Vistoria para Ampliação de Construções contendo Relatório Fotográfico e sendo conclusivo para as condições de preservação, segurança estrutural, habitabilidade, higiente e conforto da edificação</p>
        <input type="file" class="form-control"  name="laudo" value="{{ old('laudo') }}" required>
    </div>
    <hr>
    <div class="card-header text-center">
        Documentos complementares: Edificações Comerciais/Serviços/Industriais/Institucionais/Multifamiliares
    </div>
    <div class="form-group">
        <label for="memorial_descritivo_atividade"><h3>7-Memorial Descritivo/Relatório de Atividades</h3></label>
        <p>Via do Memorial Descritivo/Relatório de Atividades com comprovação de atendimento dos requisitos dispostos nas legislações para a atividade</p>
        <input type="file" class="form-control"  name="memorial_descritivo_atividade" value="{{ old('memorial_descritivo_atividade') }}" >
    </div>
    <hr>
    <div class="form-group">
        <label for="ppci_alvara"><h3>8-PPCDI/SPDA e Alvará Corpo de Bombeiros</h3></label>
        <p>Via do Projeto PPCI/SPDA e Cópia do Alvará emitdo pelo Corpo de Bombeiros</p>
        <input type="file" class="form-control"  name="ppci_alvara" value="{{ old('ppci_alvara') }}" >
    </div>
    <hr>
    <div class="form-group">
            <label for="licenca_fepam"><h3>9-Licença de Operação Ambiental</h3></label>
            <p>Cópia da Licençã de Operação emitida plo Orgão Ambiental Municipal ou pela FEPAM (Somente para indústrias e empreendimentos passíves de licenciamento ambiental)</p>
            <input type="file" class="form-control"  name="licenca_fepam" value="{{ old('licenca_fepam') }}" >
        </div>
        <hr>    
    <div class="form-group">
        <label for="alvara_sanitaria"><h3>10-Alvará Vigilância Sanitária ou CEVS</h3></label>
        <p>Cópia do Alvará emitido pelo Orgão de Vigil;ancia Sanitária Municipal ou pelo CEVS somente para estabelecimentos de saúde, educação e outros onde houver manipulação ou consumo de alimentos)</p>
        <input type="file" class="form-control"  name="alvara_sanitaria" value="{{ old('alvara_sanitaria') }}" >
    </div>
    <hr>

    @if ($errors->any())
        <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
        </div>
    @endif
  
