@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h1 class = "text-center">Solicitudes de Registro de Atletas</h1>
    <hr>
    <table class="table col-12 table-responsive">
        <thead class="thead-dark">
            <tr>
            <td scope="col">Identificación</td>
            <td scope="col">Nombre</td>
            <td scope="col">Apellidos</td>
            <td scope="col">Telefono</td>
            <td scope="col">Id disciplina</td> 
            </tr>
        </thead>
        @foreach ($athlete_requests as $athlete_request)
        <tbody>            
            </tr>        
            <td scope="col">{{ $athlete_request->identification }}</td>
            <td scope="col">{{ $athlete_request->name }}</td>
            <td scope="col">{{ $athlete_request->lastname }}</td>
            <td scope="col">{{ $athlete_request->phone }}</td>
            <td scope="col">{{ $athlete_request->sport_id }}</td>
            <td>
                <form action = "{{ route('athlete_accepted', $athlete_request->identification) }}" method = "POST">
                    @csfr
                    <button class="btn btn-negro" type ="submit">Aceptar</button>
                </form>   
                <form action="{{ route('athlete_delete', $athlete_request->identification) }}" method = "POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-negro" type ="submit">Denegar</button>
                </form>
            </td>
            </tr>
        </tbody>
        @endforeach  
    </table>
</div>
@endsection


