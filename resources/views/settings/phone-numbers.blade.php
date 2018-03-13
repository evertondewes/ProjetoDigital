@extends ('settings.layout')

@section ('settings-content')
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>DDD</th>
                <th>Telefone</th>
                @if (count($phoneNumbers) > 1)
                    <th>Ação</th>
                @endif
            </tr>
        </thead>

        <tbody>
            @foreach ($phoneNumbers as $phoneNumber)
                <tr>
                    <td>{{ $phoneNumber->area_code }}</td>
                    <td>{{ $phoneNumber->phone }}</td>

                    @if (count($phoneNumbers) > 1)
                        <td>
                            <a class="text-danger" href="#"  data-form-id="#delete-phone-{{ $phoneNumber->id }}-form" data-toggle="modal" data-target="#are-you-sure-modal">
                                Excluir
                            </a>
                        </td>

                        <form class="d-none" id="delete-phone-{{ $phoneNumber->id }}-form" method="POST" action="/settings/{{ $phoneNumber->id }}/phone-numbers">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                        </form>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>

    <hr>

    <form method="POST" action="/settings/phone-numbers">
        {{ csrf_field() }}

        <div class="form-row form-group">
            <div class="col-4 col-sm-3">
                <label for="area_code">DDD:</label>
                <select class="form-control" name="area_code" id="area_code">
                    @for ($i = 11; $i < 99; ++$i)
                        <option {{ $i === 55 ? 'selected' : '' }} value="{{ $i }}">
                            {{ $i }}
                        </option>
                    @endfor
                </select>
            </div>

            <div class="col-8 col-sm-9">
                <label for="phone">Telefone:</label>
                <input class="form-control" type="text" name="phone" id="phone" value="{{ old('phone') }}" placeholder="Somente números.">
            </div>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-custom">
                Adicionar
            </button>
        </div>
    </form>
@endsection
