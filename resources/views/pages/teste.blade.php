@extends ('layouts.master')

@section ('title', 'Upload')

@section ('content')
    <form action="/teste" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        Planta:
        <br />
        <input type="file" name="documentos[]" id="tal" />
        <br /><br />
        Planta:
        <br />
        <input type="file" name="documentos[]" id="tal" />
        <br /><br />
        <input type="submit" value=" Save " />
    </form>
@endsection
