    <table>
        <thead>
            <tr>
                <th>Identificación</th>
                <th>Nombre Completo</th>
                <th>Teléfono</th>
                <th>Estado</th>
                <th>Disciplina</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($athletes as $athlete)
                <tr>
                    <td>{{ $athlete->user->identification }}</td>
                    <td>{{ $athlete->user->name . ' ' . $athlete->user->lastname }}</td>
                    <td>{{ $athlete->user->phone }}</td>
                    <td>{{ $athlete->state }}</td>
                    <td>{{ $athlete->sport->description }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
