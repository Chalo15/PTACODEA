@extends('layouts.app')


@section('content')
<body class="body_porfile">
    
    <div class="container">

        <div class="row justify-content-center">

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="d-5 text-center">Perfil Personal</h3>
                    </div>

                    <div class="card-body">

                        
                        <form class="well form-horizontal" action="{{route('saveProfile')}} " method="post"  id="formulario_perfil" enctype="multipart/form-data">
                                
                            @csrf
                            @method('put')
                            
                            
                            <!--foto de perfil-->  
                            <div class="form-group">

                                <div class="col-md-12 col-12 justify-content-center text-center">
                                    <img src="{{ asset('storage/imagenes/profile.png')}}"  width="50%">
                                </div>

                            </div>
                                
                            <div class="form-group">
                                <div class="col-12 col-sm-12 col-12 justify-content-center text-center">
                                    <a href="{{ route('changePhoto') }}" type="button" class="btn btn-negro">{{ __('Seleccionar foto de perfil') }}</a>
                                </div>
                            </div>
                                
                                
                            <div class="form-group row">

                                <div class="col-12 col-sm-6 col-md-6">
                                    <label >Nombre</label>
                                    <input value="{{$persona->name}}" type="text" name="name" class="form-control form-control-sm ">
                                </div>

                                <div class="col-12 col-sm-6 col-md-6">
                                        <label >Apellidos</label>
                                        <input value="{{$persona->lastname}}" type="text" name="lastname" class="form-control form-control-sm ">
                                </div>
                                
                            </div>
                                    
                            <div class="form-group row">
                                
                                <div class="col-md-6">
                                    <label >Correo</label>
                                    <input value="{{$persona->email}}" type="text" name="email" class="form-control form-control-sm ">
                                </div>
                                <div class="col-md-6">
                                    <label >Fecha de nacimiento</label>
                                    <input value="{{$persona->birthdate}}" type="text" name="birthdate" class="form-control form-control-sm ">
                                </div>
                                
                            </div>
                                
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label >Teléfono</label>
                                        <input value="{{$persona->phone}}" type="text" name="phone" class="form-control form-control-sm ">
                                    </div>
                                </div> 
                                
                                <div class="form-group row pt-2">
                                    <div class="col-md-12 justify-content-center text-center">
                                        <button type="submit" class="btn btn-negro m-1">
                                            Actualizar datos
                                        </button>
                                        @can('role',"Atleta")
                                        <a href="{{ route('datos_extra') }}" type="button" class="btn btn-negro">{{ __('Datos extra del atleta') }}</a>
                                        @endcan
                                    </div>
                                </div>
                            
                            
                        </form>

                    </div>

                </div>
            </div>

        </div>

    </div>
    
</body>

@endsection          
                    