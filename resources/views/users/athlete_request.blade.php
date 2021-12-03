@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h1 class = "text-center">Solicitudes de Registro de Atletas</h1>
    <hr>
    <div class="table-responsive card-body">
            <table border="2" class="table align-middle">
                <tr>
                <td scope="col">Identificación</td>
                <td scope="col">Nombre</td>
                <td scope="col">Apellidos</td>
                <td scope="col">Telefono</td>
                <td scope="col">Id disciplina</td> 
                </tr>
            </thead>
            
            <tbody>
            @foreach ($users as $user)            
                </tr>        
                <td scope="col">{{ $user->identification }}</td>
                <td scope="col">{{ $user->name }}</td>
                <td scope="col">{{ $user->lastname }}</td>
                <td scope="col">{{ $user->phone }}</td>
                <td scope="col">{{ $user->sport_id }}</td>
                <td>
                    <form action = "{{ route('athlete_accepted', $user->identification) }}" method = "POST">
                        @csrf
                        <button class="btn btn-negro" type ="submit">Aceptar</button>
                    </form>   
                    <form action="{{ route('athlete_delete', $user->identification) }}" method = "POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-negro" type ="submit">Denegar</button>
                    </form>
                </td>
                </tr>
            @endforeach 
            </tbody>         
        </table>
    </div>
</div>
@endsection


