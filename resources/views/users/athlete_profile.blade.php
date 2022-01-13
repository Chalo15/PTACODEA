@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="text-center card-header"><h3 class="d-5">Perfil Personal</h3></div>

                  
                        
                     
                       
                        <form class="well form-horizontal" action="{{route('saveProfile')}} " method="post"  id="formulario_perfil" enctype="multipart/form-data">
                            
                            @csrf
                            @method('put')

                            <!--foto de perfil-->

                            <x-row>
                                <div class="col-md-7">

                                    <tr>
                                        <img src="{{ asset('storage\imagenes\profile.png')}}"  width="25%">
    
                                    </tr>
                                </div>
                            </x-row>
                            <br>

                            
                                <div class="from-group row">
                                    <div class="col-md-8 offset-md-4">
                                        {{-- <button onclick="window.location='{{ route('changePhoto') }}'" class="btn btn-negro ml-auto m-1">Seleccionar foto de perfil</button> --}}
                                        <a href="{{ route('changePhoto') }}" type="button" class="btn btn-negro">{{ __('Seleccionar foto de perfil') }}</a>
                                        
                                    </div>
                                </div>
                                <br>

                           


                            <x-row>
                                <div class="col-md-7">

                                    <label >Nombre</label>
                                    <input value="{{$persona->name}}" type="text" name="name" class="form-control form-control-sm ">
                                    {{-- <input class="form-control" value="{{ $persona->name }}" placeholder="" type="text" name="name" class="form-control form-control-sm " > --}}
                                    </div>
                                {{-- <x-input value="{{$persona->name}}" name="nombre" placeholder="" label="Nombre"/>   --}}
                            </x-row>                                                    

                            <x-row>
                                <div class="col-md-7">
                                    <label >Apellidos</label>
                                    <input value="{{$persona->lastname}}" type="text" name="lastname" class="form-control form-control-sm ">
                                </div>
                                {{-- <input class="form-control" value="{{ $persona->lastname }}" placeholder="" type="text" name="apellidos" class="form-control form-control-sm " > --}}
                                {{-- <x-input value="{{$persona->lastname}}" name="apellidos" placeholder="" label="Apellidos"/>   --}}
                            </x-row> 
                            
                            <x-row>
                                <div class="col-md-7">

                                    <label >Correo</label>
                                  
                                    <input value="{{$persona->email}}" type="text" name="email" class="form-control form-control-sm ">
                                </div>
                                
                                {{-- <input class="form-control" value="{{ $persona->email }}" placeholder="" type="text" name="correo" class="form-control form-control-sm " > --}}
                                {{-- <x-input value="{{$persona->email}}" name="correo" placeholder="" label="Correo"/>   --}}
                            </x-row>  
                            <x-row>
                                <div class="col-md-7">
                                    
                                    <label >Fecha de nacimiento</label>
                                    <input value="{{$persona->birthdate}}" type="text" name="birthdate" class="form-control form-control-sm ">
                                </div>
                                {{-- <input class="form-control" value="{{ $persona->birthdate }}" placeholder="" type="text" name="nacimiento" class="form-control form-control-sm " > --}}
                                {{-- <x-input value="{{$persona->birthdate}}" name="nacimiento" placeholder="" label="Fecha de nacimiento"/>   --}}
                                </x-row> 
                                
                                <div class="form-group row">
                                    <div class="col-md-8 offset-md-4">
                                        <x-row>
                                            <div class="col-md-7">
                                            
                                                <label >Teléfono</label>
                                                <input value="{{$persona->phone}}" type="text" name="phone" class="form-control form-control-sm ">
                                            </div>

                                        {{-- <input class="form-control" value="{{ $persona->phone }}" placeholder="" type="text" name="telefono" class="form-control form-control-sm " > --}}
                                        {{-- <x-input value="{{$persona->phone}}" name="telefono" placeholder="" label="Teléfono"/>   --}}
                                         </x-row>    
                                         

                            

                            
                            <div class="form-group row">
                                <div class="col-md-8 offset-md-4">
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
@endsection          
