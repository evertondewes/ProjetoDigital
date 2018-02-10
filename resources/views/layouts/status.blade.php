@if ($errors->any())
    <div class="alert alert-danger alert-dismissible show">
        <ul class="m-0 list-unstyled">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>

        <button type="button" class="close" data-dismiss="alert">
            <span>&times;</span>
        </button>
    </div>
@elseif (session('status'))
    <div class="alert alert-{{ session('class') ?: 'success' }} alert-dismissible show">
        {{ session('status') }}

        <button type="button" class="close" data-dismiss="alert">
            <span>&times;</span>
        </button>
    </div>
@endif
