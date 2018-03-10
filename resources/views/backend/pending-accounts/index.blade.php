@extends ('layouts.master')

@section ('title', 'Contas pendentes de ativação')

@section ('content')
    <div class="row mt-4">
        <div class="col-md-6 mx-auto">
            <h2 class="text-center">
                <i class="fa fa-address-card-o"></i> Contas pendentes de ativação
            </h2>

            @include ('layouts.status')

            <ul class="list-group mt-4">
                @forelse ($accounts as $account)
                    <li class="list-group-item d-flex align-items-center justify-content-between">
                        <span>{{ $account->person->email }}</span>
                        <a class="btn btn-outline-info btn-custom" href="/backend/pending-accounts/{{ $account->id }}">
                            Avaliar
                        </a>
                    </li>
                @empty
                    <p class="alert alert-warning text-center">
                        Nenhuma conta pendente de ativação.
                    </p>
                @endforelse
            </ul>
        </div>
    </div>
@endsection
