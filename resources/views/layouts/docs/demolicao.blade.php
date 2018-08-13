<div class="form-group">
    <label for="guia_recolhimento"><h2>1-Requerimento e Guia de recolhimento paga:</h2></label>
    <p>Requerimento específico dirigo ao Prefeito Municipal com guia de recolhimento paga</p>
    <input type="file" class="form-control"  name="guia_recolhimento" value="{{ old('guia_recolhimento') }}" required>
</div>
<hr>
<div class="form-group">
    <label for="croqui"><h3>2-Via do Croqui da Edificação</h3></label>
    <p>Via do Croqui da Edificação a ser demolida com a implantação da edificação no lote e asituação urban quadra em escala apropriada <i>-formatação padrão ABNT-</i></p>
    <input type="file" class="form-control"  name="croqui" value="{{ old('croqui') }}" required>
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
    <p>Cópia atualizada da matrícula do imóvel em nome do requerente</p>
    <input type="file" class="form-control"  name="martricula_imovel" value="{{ old('martricula_imovel') }}" required>
</div>
    
@if ($errors->any())
    <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
    </div>
@endif
