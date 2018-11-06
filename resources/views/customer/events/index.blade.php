@extends ('layouts.master')

@section ('title', 'Eventos do projeto')

@section ('content')
    <div class="row my-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">
                    Eventos
                </div>
                <div class="card-body">
                    @if (count($events)>0)
                        @foreach ($events as $event)
                            <div class="card">
                                <div class="card-body">
                                    <p>
                                        <b>{{$event->eventType->description}} por:</b> {{$event->user->person->name}}
                                        <b>em</b> {{$event->created_at->format('j/m/Y')}}
                                        <b>as</b> {{$event->created_at->format('H:i:s')}}
                                    </p>
                                    @if(!is_null($event->obs))
                                        <p>
                                            <b>Observação:</b> {{$event->obs}}
                                        </p>
                                    @endif
                                </div>
                                <div class="card-body">
                                    @if (count($event->eventDocuments)>0)
                                        @include ('layouts.events.view')
                                    @else
                                        <p class="alert alert-warning text-center">
                                            Não há anexos disponíveis <br>
                                            <a href="/project-docs/send/{{$project->id}}">Clique aqui para anexar os arquivos necesários</a>
                                        </p>
                                    @endif

                                </div>
                            </div>    

                        @endforeach
            </div>    
                    @else
                        <p class="alert alert-warning text-center mt-3">
                            Não há nenhum evento associado à essa solicitação
                        </p>
                    @endif
                </div>
        </div>

        @include ('customer.projects.menu')
    </div>
@endsection
