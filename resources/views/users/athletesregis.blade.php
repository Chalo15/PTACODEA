@extends('layouts.app')

@section('content')
<div class="container">
   <div>
        <div class="row text-center justify-content-center">
            <div class="col-md-10 col-lg-10">
                <div class="card">
                    <div class="card-header">
                        <h2 class="text-center">Atletas Registrados en la disciplina</h2>
                        
                    </div> 
                    
                    <div class="table-responsive card-body">
                        <table border="2" class="table align-middle">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                                   
                            <tbody>
                                @foreach ($athletes as $atleta)
                                <tr>
                                    <td>{{$atleta->name}}</td>
                                    <td>{{$atleta->lastname}}</td>
                                    <td><button class="btn btn-negro">Registrar Datos De Sesión</button></td> <!--Se debe eliminar esta fila y reemplazarla por la de abajo con los datos pertinentes.-->
                                    <!--<td><a href='realizar.php?id=".$fila['id_ruta']."' style='color:#D35400'>Registrar datos de sesión</a></td>-->
                                </tr>                                      
                                @endforeach
                            </tbody>
        
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>  
</div>

@endsection