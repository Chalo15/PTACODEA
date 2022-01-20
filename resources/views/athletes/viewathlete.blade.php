@extends('layouts.app')

@section('content')
<body class="athlete_request">  
    <div class="container-fluid">
        <h1 class = "text-center">Atletas Registrados en el Sistema</h1>
        <hr>
        <div class="table-responsive card-body">
            <table border="2" class="table align-middle">
                <tr>
                    <td scope="col">Identificación</td>
                    <td scope="col">Nombre</td>
                    <td scope="col">Apellidos</td>
                    <td scope="col">Telefono</td>
                    <td scope="col">Id Disciplina</td> 
                    <td scope="col">Acción</td>
                </tr>
            </thead>
                
                <tbody>
                @foreach ($users as $user)
                @foreach ($atletas as $atleta)         
                    </tr>        
                    <td scope="col">{{ $user->identification }}</td>
                    <td scope="col">{{ $user->name }}</td>
                    <td scope="col">{{ $user->lastname }}</td>
                    <td scope="col">{{ $user->phone }}</td>
                    <td scope="col">{{ $atleta->sport_id }}</td>
                    <td>
                        <div class="justify-content-center text-center">
                            <form class="d-inline" action = "{{ route('datos', $atleta->id) }}" method = "GET">
                                @csrf
                                <button class="d-inline btn btn-negro" type ="submit">Ver Datos</button>
                            </form> 
                            
                            <form class="d-inline " action="{{ route('athlete.delete', $atleta->id) }}" method = "GET">
                                @csrf
                                @method('PUT')
                                <button class="d-inline btn btn-negro" type ="submit">Eliminar</button>
                            </form>
                        </div>
                    </td>
                    </tr>
                @endforeach 
                @endforeach
                </tbody>         
            </table>
        </div>
    </div>
    
</body>
@endsection