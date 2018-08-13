    <div class="form-group">
        <label for="guia_recolhimento"><h3>1-Requerimento e Guia de recolhimento paga:</h3></label>
        <p>Requerimento específico dirigo ao Prefeito Municipal com guia de recolhimento paga</p>
        <input type="file" class="form-control"  name="guia_recolhimento" value="{{ old('guia_recolhimento') }}" required>
    </div>
    <hr>
    <div class="form-group">
        <label for="alvara_construcao"><h3>2-Alvará de Construção</h3></label>
        <p>Cópia do Alvará de Construção emitido pelo Munícipio(em vigor)</p>
        <input type="file" class="form-control"  name="alvara_construcao" value="{{ old('alvara_construcao') }}" required>
    </div>
    <hr>
    <div class="form-group">
        <label for="martricula_imovel"><h3>3-Matrícula do Imóvel</h3></label>
        <p>Cópia atualizada da matrícula do imóvel em nome do requerente</p>
        <input type="file" class="form-control"  name="martricula_imovel" value="{{ old('martricula_imovel') }}" required>
    </div>
    <hr>
    <div class="form-group">
        <label for="alvara_bombeiros"><h3>4-Alvará Corpo de Bombeiros</h3></label>
        <p>Cópia do Alvará emitido pelo Corpo de Bombeiros</p>
        <input type="file" class="form-control"  name="alvara_bombeiros" value="{{ old('alvara_bombeiros') }}" required>
    </div>
    <hr>
    <div class="form-group">
            <label for="licenca_fepam"><h3>5-Licença de Operação Ambiental</h3></label>
            <p>Cópia da Licençã de Operação emitida plo Orgão Ambiental Municipal ou pela FEPAM (Somente para indústrias e empreendimentos passíves de licenciamento ambiental)</p>
            <input type="file" class="form-control"  name="licenca_fepam" value="{{ old('licenca_fepam') }}" required>
        </div>
        <hr>    
    <div class="form-group">
        <label for="alvara_sanitaria"><h3>6-Alvará Vigilância Sanitária ou CEVS</h3></label>
        <p>Cópia do Alvará emitido pelo Orgão de Vigil;ancia Sanitária Municipal ou pelo CEVS somente para estabelecimentos de saúde, educação e outros onde houver manipulação ou consumo de alimentos)</p>
        <input type="file" class="form-control"  name="alvara_sanitaria" value="{{ old('alvara_sanitaria') }}" required>
    </div>
    <hr>
    @if ($errors->any())
        <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
        </div>
    @endif
  
