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
        <label for="viabilidade_tecnica"><h3>4-Declaração de Disponibilidade/Viabilidade Técnica</h3></label>
        <p>Declaração de Disponibilidade/Viabilidade Técnica (de água potável, de esgotamento sanitário, de esgotamento pluvial, de energia elétrica e de iluminação) emitidas pelas concessionárias dos servições</p>
        <input type="file" class="form-control"  name="viabilidade_tecnica" value="{{ old('viabilidade_tecnica') }}" required>
    </div>
    <hr>
    <div class="form-group">
        <label for="disponibilidade_coleta"><h3>5-Disponibilidade de Coleta de Resíduos</h3></label>
        <p>Declaração de disponibilidade de coleta de resíduos emitida pela Secretária de Obras</p>
        <input type="file" class="form-control"  name="disponibilidade_coleta" value="{{ old('disponibilidade_coleta') }}" required>
    </div>
    <hr>
    <div class="form-group">
        <label for="esgotamento"><h3>6-Solução de Esgotamento Pluvial</h3></label>
        <p>>Solução de esgotamento pluvial das águas dos lotes e vias públicas projetedas</p>
        <input type="file" class="form-control"  name="esgotamento" value="{{ old('esgotamento') }}" required>
    </div>
    <hr>
    <div class="form-group">
        <label for="solo"><h3>7-Teste de Permeabilidade do Solo</h3></label>
        <p>Teste de Permeabilidade do Solo ou Ensaio de Infiltração apontando o Sistema de Tratamento dos Esgotos adequado ao local</p>
        <input type="file" class="form-control"  name="solo" value="{{ old('solo') }}" required>
    </div>
    <hr>
    <div class="form-group">
        <label for="licenca_ambiental"><h3>8-Licenciamento Ambiental</h3></label>
        <p>'Licenciamento Ambiental prévio para a atividade</p>
        <input type="file" class="form-control"  name="licenca_ambiental" value="{{ old('licenca_ambiental') }}" required>
    </div>
    <hr>
    <div class="form-group">
        <label for="vias_projeto"><h3>9-Projeto de Loteamento</h3></label>
        <p>Uma via, em escala propriada <i>-formatação padrão ABNT-</i>, do Projeto do Loteamento com levantamento planialtimetrico; previsão das quadras, ruas e lotes; gabaritos das vias públicas projetadas no local e das vias existentes no entorno; com apontamento dos equipamentos urbanos e comunitários existentes no local e no entorno num raio de até 500m; com apontamento das construções existentes e acidentes naturais e artificias no local e no entorno num raio de 100m;</p>
        <input type="file" class="form-control"  name="vias_projeto" value="{{ old('vias_projeto') }}" required>
    </div>
    <hr>
    <div class="form-group">
        <label for="vias_memorial_descritivo"><h3>10-Memorial Descritivo</h3></label>
        <p>Memorial Descritivo dos Lotes, das Quadras e Ruas Previstas;</p>
        <input type="file" class="form-control"  name="vias_memorial_descritivo" value="{{ old('vias_memorial_descritivo') }}" required>
    </div>
    <hr>


    @if ($errors->any())
        <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
        </div>
    @endif
  
