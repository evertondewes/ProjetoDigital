@extends ('layouts.master')

@section ('title', 'Eventos do projeto')

@section ('content')
    <div class="row my-4">
        <div class="col-md-8">
            @include ('layouts.status')

            <div class="card">
                <div class="card-header text-center">
                    Eventos da Solicitação
                </div>
                <div class="card-body">
                    @if (count($events))
                        @include ('layouts.events.view')
                    @else
                        <p class="alert alert-warning text-center">
                            Não há eventos disponíveis <br>
                        </p>
                    @endif
                </div>
            </div>
        </div>

        @include ('customer.projects.menu')
    </div>
@endsection