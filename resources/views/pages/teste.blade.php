@extends ('layouts.master')

@section ('title', 'Upload')

@section ('content')
    <form action="/teste" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        Guia de recolhimento:
        <br/>
        <input type="file" name="guia_recolhimento"  />
        <br /><br />
        Plantas:
        <br/>
        <input type="file" name="plantas[]" multiple/>
        <br /><br />
        <input type="submit" value=" Save " />
    </form>

    @if ($errors->any())
        <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
        </div>
    @endif

    <a href="/view-document/122/guia_recolhimento" target="_blank">Guia de recolhimento</a>

@endsection
