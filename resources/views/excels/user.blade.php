    <table>
        <thead>
            <tr>
                <th>Cédula</th>
                <th>Nombre Completo</th>
                <th>Correo electrónico</th>
                <th>Rol</th>
                <th>Fecha de Nacimiento</th>
                <th>Genero</th>
                <th>Télefono</th>
                <th>Provincia</th>
                <th>Ciudad</th>
                <th>Dirección</th>
                <th>Numero de Contrato</th>
                <th>Años de Contrato</th>
                <th>Años de Experiencia</th>
                <th>Fecha de Creacion</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->identification }}</td>
                    <td>{{ $user->full_name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role->description }}</td>
                    <td>{{ $user->birthdate }}</td>
                    <td>{{ $user->gender }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>{{ $user->province }}</td>
                    <td>{{ $user->city }}</td>
                    <td>{{ $user->address }}</td>
                    <td>{{ $user->contract_number }}</td>
                    <td>{{ $user->contract_year }}</td>
                    <td>{{ $user->experience }}</td>
                    <td>{{ $user->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
