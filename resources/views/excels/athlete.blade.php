    <table>
        <thead>
            <tr>
                <th>Identificación</th>
                <th>Nombre Completo</th>
                <th>Teléfono</th>
                <th>Genero</th>
                <th>Estado</th>
                <th>Disciplina</th>
                <th>Entrenador</th>
                <th>Numero de Poliza</th>
                <th>Tipo de Sangre</th>
                <th>Lateralidad</th>
                <th>Categoría</th>
                <th>Nombre Encargado</th>
                <th>Parentesco</th>
                <th>Cédula del Encargado</th>
                <th>Télefono del Encargado</th>
                <th>Fecha de Creación</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($athletes as $athlete)
                <tr>
                    <td>{{ $athlete->user->identification }}</td>
                    <td>{{ $athlete->user->name . ' ' . $athlete->user->lastname }}</td>
                    <td>{{ $athlete->user->phone }}</td>
                    <td>{{ $athlete->user->gender }}</td>
                    <td>{{ $athlete->state }}</td>
                    <td>{{ $athlete->sport->description }}</td>
                    <td>{{ $athlete->coach->user->full_name }}</td>
                    <td>{{ $athlete->policy }}</td>
                    <td>{{ $athlete->blood }}</td>
                    <td>{{ $athlete->laterality }}</td>
                    <td>{{ $athlete->category }}</td>
                    <td>{{ $athlete->name_manager . ' ' . $athlete->lastname_manager}}</td>
                    <td>{{ $athlete->manager }}</td>
                    <td>{{ $athlete->identification_manager }}</td>
                    <td>{{ $athlete->contact_manager }}</td>
                    <td>{{ $athlete->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
