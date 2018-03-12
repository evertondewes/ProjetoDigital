<table class="table">
    <tbody>
        <tr>
            <th>Número:</th>
            <td>{{ $project->id }}</td>
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
            <td>{{ $project->technical_manager->person->name }}</td>
        </tr>
        <tr>
            <th>CREA / CAU:</th>
            <td>{{ $project->technical_manager->person->crea_cau }}</td>
        </tr>
        <tr>
            <th>Cliente:</th>
            <td>{{ $project->owner->name }}</td>
        </tr>
    </tbody>
</table>