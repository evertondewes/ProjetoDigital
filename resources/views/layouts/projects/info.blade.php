<table class="table">
    <tbody>
        <tr>
            <th>Número:</th>
            <td>{{ $project->id }}</td>
            <th>Chave:</th>
            <td>{{ $project->access_key }}</td>
        </tr>
        <tr>
            <th>Solicitado em:</th>
            <td>{{ $project->created_at->format('j/m/Y') }}</td>
        </tr>
        <tr>
            <th>Última atualização:</th>
            <td>{{ $project->lastEvent()
                    ? $project->lastEvent()->updated_at->format('j/m/Y')
                    : $project->created_at->format('j/m/Y')
            }}</td>
        </tr>
        <tr>
            <th>Tipo:</th>
            <td>{{ $project->projectType->description }}</td>
        </tr>
        <tr>
            <th>Descrição:</th>
            <td>{{ $project->description }}</td>
        </tr>
        <tr>
            <th>Localização:</th>
            <td>{{ $project->formattedAddress() }}</td>
        </tr>
        <tr>
            <th>Área:</th>
            <td>{{ $project->address->area . ' m²' }}</td>
        </tr>
        <tr>
            <th>Responsável Técnico:</th>
            <td>
                <a data-toggle="collapse" href="#collapseTechnical_Manager" role="button" aria-expanded="false" aria-controls="collapseExample">
                    {{ $project->technical_manager->person->name }}
                </a>
                <div class="collapse" id="collapseTechnical_Manager">
                        <p><strong>CPF/CNPJ:</strong> {{ $project->technical_manager->person->cpf_cnpj}}</p>
                        <p><strong>Email:</strong> {{ $project->technical_manager->person->email}}</p>
                        <p><strong>Telefone</strong> 
                            @foreach ($project->technical_manager->person->phoneNumbers as $phoneNumber)
                                    ({{ $phoneNumber->area_code }}) {{ $phoneNumber->phone }}
                            @endforeach
                        </p>
                        <p><strong>Endereço:</strong> 
                            {{ $project->technical_manager->person->address->street}} 
                            {{ $project->technical_manager->person->address->number}},
                            {{ $project->technical_manager->person->address->district}} -
                            {{ $project->technical_manager->person->address->city->name}} 
                            {{ $project->technical_manager->person->address->city->state->abbreviation}} 
                        </p>      
                </div>
            </td>
        </tr>
        <tr>
            <th>CREA / CAU:</th>
            <td>{{ $project->technical_manager->person->crea_cau }}</td>
        </tr>
        <tr>
            <th>Requerente(s):</th>
            {{-- <td>{{ implode(', ', $project->people->pluck('name')->all()) }}</td> --}}
            <td>
               @foreach  ($project->people as $people)
                   <a data-toggle="collapse" href="#collapsePeople" role="button" aria-expanded="false" aria-controls="collapseExample">
                       {{ $people->name }}
                   </a>
                   <div class="collapse" id="collapsePeople">
                           <p><strong>CPF/CNPJ:</strong> {{ $people->cpf_cnpj}}</p>
                           <p><strong>Email:</strong> {{ $people->email}}</p>
                           <p><strong>Telefone</strong> 
                               @foreach ($people->phoneNumbers as $phoneNumber)
                                       ({{ $phoneNumber->area_code }}) {{ $phoneNumber->phone }}
                               @endforeach
                           </p>
                           <p><strong>Endereço:</strong> 
                               {{ $people->address->street}} 
                               {{ $people->address->number}},
                               {{ $people->address->district}} -
                               {{ $people->address->city->name}} 
                               {{ $people->address->city->state->abbreviation}} 
                           </p>
               @endforeach
            </td>

        </tr>
    </tbody>
</table>
