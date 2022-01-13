@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="text-center card-header"><h3 class="d-5">Perfil Personal</h3></div>

                  
                        
                      {{-- @foreach($user as $us)  --}}
                       
                        <form class="well form-horizontal" action="{{route('saveProfile')}} " method="post"  id="formulario_perfil" enctype="multipart/form-data">
                            
                            @csrf
                            @method('put')

                            <!--foto de perfil-->

                            <x-row>
                                <tr>
                                    <img src="{{ asset('storage\imagenes\profile.png')}}"  width="60%">

                                </tr>
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
                                <x-input name="nombre" placeholder="" label="Nombre"/> <!--duda -->  
                            </x-row>                                                    

                            <x-row>
                                <x-input name="apellidos" placeholder="" label="Apellidos"/> <!--duda -->  
                            </x-row> 
                            
                            <x-row>
                                <x-input name="correo" placeholder="" label="Correo"/> <!--duda -->  
                            </x-row>  
                            <x-row>
                                <x-input name="nacimiento" placeholder="" label="Fecha de nacimiento"/> <!--duda -->  
                            </x-row>      
                            <x-row>
                                <x-input name="telefono" placeholder="" label="Teléfono"/> <!--duda -->  
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
                            
                           

                                <!-- Formulario-->
                            
                            

                        </form> 
                        {{-- @endforeach --}}
                      
                        
            
            
                 </div>
            </div>
        </div>
    </div>      
@endsection          
