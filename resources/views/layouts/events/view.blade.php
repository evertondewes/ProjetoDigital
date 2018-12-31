<table class="table">
    <thead>
    <tr>
        <th>ID</th>
        <th>Data</th>
        <th>Usuário</th>
        <th>Tipo</th>
        <th>Status</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($events as $event)
        <tr>
            <td>{{ $event->id }}</td>
            <td>{{ $event->created_at->format('d/m/Y') }}</td>
            <td>{{ $event->user->person->name }}</td>
            <td>{{ $event->eventType->description }}</td>
            <td></td>
        </tr>
    @endforeach
    </tbody>
</table>
  
    
    
