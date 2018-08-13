    <div class="form-group">
        <label for="guia_recolhimento"><h3>1-Requerimento e Guia de recolhimento paga:</h3></label>
        <p>Requerimento específico dirigo ao Prefeito Municipal com guia de recolhimento paga</p>
        <input type="file" class="form-control"  name="guia_recolhimento" value="{{ old('guia_recolhimento') }}" required>
    </div>
    <hr>
    <div class="form-group">
        <label for="plantas"><h3>2-Plantas Baixas</h3></label>
        <p>Uma via, em escala propriada <i>-formatação padrão ABNT-</i>, do Levantamento Arquitetônico: Planta Baixa, Planta de Cobertura, Corte Longitudinal e Transversal, Fachadas, Planta da Situação/Localização;</p>
        <input type="file" class="form-control"  name="plantas" value="{{ old('plantas') }}" required>
    </div>
    <hr>
    <div class="form-group">
        <label for="art_rrt"><h3>3-ART/RRT</h3></label>
        <p>Via da ART/RRT específica do responsável Técnico com comprovante de pagamento</p>
        <input type="file" class="form-control"  name="art_rrt" value="{{ old('art_rrt') }}" required>
    </div>
    <hr>
    <div class="form-group">
        <label for="martricula_imovel"><h3>4-Matrícula do Imóvel</h3></label>
        <p>Cópia atualizada da matrícula do imóvel em nome do requerente e contrato de compra e venda com autorização para construção em imóvel de terceiros autenticada em cartório se caso o imóvel não for em nome do requerente</p>
        <input type="file" class="form-control"  name="martricula_imovel" value="{{ old('martricula_imovel') }}" required>
    </div>
    <hr>
    <div class="form-group">
        <label for="laudo_vistoria"><h3>5-Laudo de Vistoria</h3></label>
        <p>Laudo de Vistoria para Ampliação de Construções contendo Relatório Fotográfico e sendo conclusivo para as condições de preservação, segurança estrutural, habitabilidade, higiente e conforto da edificação e identificando eventuais pendências de adaptação considerando o uso atual </p>
        <input type="file" class="form-control"  name="laudo_vistoria" value="{{ old('laudo_vistoria') }}" required>
    </div>
    <hr>
    <div class="card-header text-center">
        Documentos complementares: Edificações Comerciais/Serviços/Industriais/Institucionais/Multifamiliares
    </div>
    <div class="form-group">
        <label for="vias_memorial_descritivo"><h3>6-Memorial Descritivo da Obra/Relatório de Atividades</h3></label>
        <p>Via do Memorial Descritivo da Obra/Relatório de Atividades com compravação de atendimento dos requisitos dispostas nas legislaçãoes para a atividade atual</p>
        <input type="file" class="form-control"  name="vias_memorial_descritivo" value="{{ old('vias_memorial_descritivo') }}" required>
    </div>
    <hr>
    <div class="form-group">
        <label for="tratamento_afluentes"><h3>7-Laudo do Sistema de Tratamento de Efluentes</h3></label>
        <p>Via do Luado do Sistema de Tratamento de Efluentes apontando o sistema adotado e localizando em planta e sendo conclusivo para as condições de funcionamento ou identificando eventuais pendências de adaptação considerando a atividade atual</p>
        <input type="file" class="form-control"  name="tratamento_afluentes" value="{{ old('tratamento_afluentes') }}" >
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
  
