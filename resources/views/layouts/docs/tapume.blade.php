    <div class="form-group">
        <label for="guia_recolhimento"><h2>Guia de recolhimento paga:</h2></label>
        <p>blah blah blah</p>
        <input type="file" class="form-control"  name="guia_recolhimento" value="{{ old('guia_recolhimento') }}" required>
    </div>
    <hr>
    <div class="form-group">
        <label for="plantas"><h2>Plantas do tapume:</h2></label>
        <p>blah blah blah</p>
        <input type="file" class="form-control" name="plantas[]" value="{{ old('plantas[]') }}" required multiple>
    </div>
        
    @if ($errors->any())
        <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
        </div>
    @endif
  
