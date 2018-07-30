<div class="form-group">
    <label for="guia_recolhimento"><h2>Requerimento e Guia de recolhimento paga:</h2></label>
    <p>Requerimento específico dirigo ao Prefeito Municipal com guia de recolhimento paga</p>
    <input type="file" class="form-control"  name="guia_recolhimento" value="{{ old('guia_recolhimento') }}" required>
</div>
<hr>
<div class="form-group">
    <label for="plantas"><h2>Alvará de Construção ou Autorização de Demolição:</h2></label>
    <p>1 cópia do Alvará de Construção ou Autorização de Demolição emitido pelo pelo Município:</p>
    <input type="file" class="form-control" name="alvara_ou_autorizacao" value="{{ old('alvara_ou_autorizacao') }}" required>
</div>
    
@if ($errors->any())
    <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
    </div>
@endif
