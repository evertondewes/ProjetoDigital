@extends ('layouts.master')

@section ('title', 'Contas pendentes de ativação')

@section ('content')
    <div class="row mt-4">
        <div class="col-md-6 mx-auto">
            @include ('layouts.status')

            @if (count($accounts))
                <div class="card">
                    <div class="card-header text-center">
                        Contas pendentes de ativação
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <tbody>
                                @foreach ($accounts as $account)
                                    <tr>
                                        <th>{{ $account->person->email }}</th>
                                        <td class="text-center">
                                            <a class="btn btn-outline-info btn-custom" href="/backend/pending-accounts/{{ $account->id }}">
                                                Avaliar
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @else
                <p class="alert alert-warning text-center">
                    Nenhuma conta pendente de ativação!
                </p>
            @endif
        </div>
    </div>
@endsection
