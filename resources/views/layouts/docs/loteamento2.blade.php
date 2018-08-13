    <div class="form-group">
        <label for="guia_recolhimento"><h3>1-Requerimento e Guia de recolhimento paga:</h3></label>
        <p>Requerimento específico dirigo ao Prefeito Municipal com guia de recolhimento paga</p>
        <input type="file" class="form-control"  name="guia_recolhimento" value="{{ old('guia_recolhimento') }}" required>
    </div>
    <hr>
    <div class="form-group">
        <label for="art_rrt"><h3>2-ART/RRT</h3></label>
        <p>Via da ART/RRT específica do responsável Técnico com comprovante de pagamento</p>
        <input type="file" class="form-control"  name="art_rrt" value="{{ old('art_rrt') }}" required>
    </div>
    <hr>
    <div class="form-group">
        <label for="martricula_imovel"><h3>3-Matrícula do Imóvel</h3></label>
        <p>Cópia atualizada da matrícula do imóvel em nome do requerente</p>
        <input type="file" class="form-control"  name="martricula_imovel" value="{{ old('martricula_imovel') }}" required>
    </div>
    <hr>
    <div class="form-group">
        <label for="aprovacao_tecnico"><h3>4-Termo de Aprovação Técnica</h3></label>
        <p>Termo de Aprovação Técnica (de distruibuição de água potável e de energia elétrica) emitidas pelas concessionárias dos serviços</p>
        <input type="file" class="form-control"  name="aprovacao_tecnico" value="{{ old('aprovacao_tecnico') }}" required>
    </div>
    <hr>
    <div class="form-group">
        <label for="terras"><h3>5-Projeto de Movimentação de Terras</h3></label>
        <p>Projeto de Movimentação de Terras com Anotação de Responsabilidade Técnica</p>
        <input type="file" class="form-control"  name="terras" value="{{ old('terras') }}" required>
    </div>
    <hr>
    <div class="form-group">
        <label for="microdrenagem"><h3>6-Projeto de Microdrenagem Pluvial</h3></label>
        <p>Projeto de Microdrenagem Pluvial com Anotação de Responsabilidade Técnica</p>
        <input type="file" class="form-control"  name="microdrenagem" value="{{ old('microdrenagem') }}" required>
    </div>
    <hr>
    <div class="form-group">
        <label for="esgoto"><h3>7- Projeto de Tratamento de Esgoto</h3></label>
        <p>Projeto de tratamento de esgotos domésticos incluso o perfil do solo e nival do lençol freático e Anotação de Responsabilidade Técnica</p>
        <input type="file" class="form-control"  name="esgoto" value="{{ old('esgoto') }}" required>
    </div>
    <hr>
    <div class="form-group">
        <label for="pavimentacao"><h3>8-Projeto de Pavimentação</h3></label>
        <p>Projeto de Pavimentação e Sinalização Viária com Anotação de Responsabilidade Técnica(se for o caso)</p>
        <input type="file" class="form-control"  name="pavimentacao" value="{{ old('pavimentacao') }}" required>
    </div>
    <hr>
    <div class="form-group">
        <label for="agua"><h3>9-Projeto de Aguá Potável</h3></label>
        <p>Projeto de Aguá Potável aprovado pela concessionária do serviço</p>
        <input type="file" class="form-control"  name="agua" value="{{ old('agua') }}" required>
    </div>
    <hr>
    <div class="form-group">
        <label for="energia"><h3>10-Projeto de Distribuição de Energia</h3></label>
        <p>Projeto da rede de Distribuição de Energia e Iluminação pública aprovado pela concessionária do serviço</p>
        <input type="file" class="form-control"  name="energia" value="{{ old('energia') }}" required>
    </div>
    <hr>
    <div class="form-group">
        <label for="termo_aprovacao"><h3>11-Termo de Aprovação de Loteamento</h3></label>
        <p>Cópia do Termo de Aprovação de Loteamento(fase urbanística) emitido pelo Setor de Projetos e Fiscalização</p>
        <input type="file" class="form-control"  name="termo_aprovacao" value="{{ old('termo_aprovacao') }}" required>
    </div>
    <hr>
   <div class="form-group">
       <label for="cronograma"><h3>12-Cronograma Físico-Financeiro</h3></label>
       <p>Cronograma Físico-Financeiro de Execução de Obras de Infraestrutura com prazo máximo de 04(quatro) anos eom Anotação de Responsabilidade Técnica</p>
       <input type="file" class="form-control"  name="cronograma" value="{{ old('cronograma') }}" required>
   </div>
   <hr>
   <div class="form-group">
       <label for="licenca_ambiental"><h3>13-Licenciamento Ambiental</h3></label>
       <p>Licenciamento Ambiental de instalação de empreendimento para a atividade</p>
       <input type="file" class="form-control"  name="licenca_ambiental" value="{{ old('licenca_ambiental') }}" required>
   </div>
   <hr>

    @if ($errors->any())
        <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
        </div>
    @endif
  
