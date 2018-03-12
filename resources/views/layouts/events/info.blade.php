<table class="table">
    <tbody>
        <tr>
            <th>Tipo:</th>
            <td>{{ $event->eventType->description }}</td>
        </tr>
        <tr>
            <th>Descrição:</th>
            <td>{{ $event->description }}</td>
        </tr>
        <tr>
            <th>Usuário responsável:</th>
            <td>{{ $event->user->username }}</td>
        </tr>
        <tr>
            <th>Projeto associado:</th>
            <td>{{ $event->project->id }}</td>
        </tr>
        <tr>
            <th>Data de criação:</th>
            <td>{{ $event->created_at->format('j/m/Y') }}</td>
        </tr>
    </tbody>
</table>