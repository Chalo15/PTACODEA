@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="text-center card-header"><h3 class="d-5">Perfil Personal</h3></div>

                    <div class="usuario text-center"><i class="fas fa-user p-2"></i></div>

                    <div class="card-body">
                        
                       <!--@foreach($athletes as $ath)-->
                       @foreach($user as $us) 
                        <form class="well form-horizontal" action="{{route('saveProfile')}} " method="post"  id="formulario_perfil" enctype="multipart/form-data">
                            
                            @csrf
                            @method('put')
                            <!--foto de perfil-->
                            <!--<div>
                                <img id="seleccionada" style="max-height: 300px;">
                            </div>-->     
                            
                            <x-row>
                                <img src="/storage/imagen/{{$us->photo}}" width="60%">
                            </x-row> 

                            <x-row>
                                <input name="imagen" id="imagen" type='file' class="hidden"/>
                            </x-row>

                                <!-- Formulario-->
                            <x-row>
                                <x-input name="nombre" placeholder={{$us->name}} label="Nombre"/> <!--duda -->  
                            </x-row>    

                            <x-row>
                                <x-input name="apellidos" placeholder={{$us->lastname}} label="Apellidos"/> <!--duda -->  
                            </x-row> 
                            
                            <x-row>
                                <x-input name="correo" placeholder={{$us->email}} label="Correo"/> <!--duda -->  
                            </x-row>  
                            <x-row>
                                <x-input name="nacimiento" placeholder={{$us->birthdate}} label="Fecha de nacimiento"/> <!--duda -->  
                            </x-row>      
                            <x-row>
                                <x-input name="telefono" placeholder={{$us->phone}} label="Teléfono"/> <!--duda -->  
                            </x-row>    

                            <div class="form-group row">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-negro m-1">
                                        {{ __('Actualizar datos') }}
                                    </button>
                                    <button onclick= "window.location='{{ url('datos_extra') }}'" class="btn btn-negro ml-auto m-1">
                                        {{__('Datos extra de Atleta')}}
    
                                    </button>
                                </div>
                            </div>

                        </form> 
                        @endforeach
                       <!-- @endforeach     -->
                    </div>    
            
            
                </div>
            </div>
        </div>
    </div>      
@endsection          
<!--<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function(e){
        $('#imagen').change(function(){
            let reader=new FileReader();
            reader.onload=(e)=>{
                $('#seleccionada').attr('src',e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });
    });
</script> -->