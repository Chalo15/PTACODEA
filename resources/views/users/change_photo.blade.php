@extends('layouts.app')

@section('content')
<body class="change_photo">
    <div class="container">
        <div class="row row justify-content-center pt-3">
            <div class="col-md-8">
                <div class="card">               
                    <div class="py-3 text-center card-header">
                        <h3>Seleccionar foto de perfil</h3>
                    </div>

                        <form class="well form-horizontal" action="{{route('savePhoto')}} " method="post"  id="formulario_foto_perfil" enctype="multipart/form-data">
                            @csrf
                                <!--foto de perfil-->
                            
                                <div class="grid grid-cols-1 mt-5 mx-7">
                                    <img id="seleccionada" style="max-height: 300px;" >       
                                </div>     
                                

                                
                                {{-- <input class="text-sm cursor-pointer w-36 hidden"  type="file" name="imagen" id="imagen" >  --}}

                                {{-- <div class="fixed z-10 top-0 w-full h-full flex bg-black bg-opacity-60">
                                    <div class="extraOutline p-4 bg-white w-max bg-whtie m-auto rounded-lg">
                                    <div class="file_upload p-5 relative border-4 border-dotted border-gray-300 rounded-lg" style="width:450px;">
                                        <svg class="text-indigo-500 w-24 mx-auto mb-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" /></svg>
                                        <div class="input_field flex flex-col w-max mx-auto text-center">
                                            <label>
                                                <input class="text-sm cursor-pointer w-36 hidden"  type="file" name="imagen" id="imagen" multiple> 
                                                <div class="text bg-indigo-600 text-white border border-gray-300 rounded font-semibold cursor-pointer p-1 px-3 hover:bg-indigo-500">Seleccionar</div>
                                                </label>
                                            
                                            
                                        </div>      
                                        <div class="close_btn absolute -top-10 -right-10 bg-white p-4 cursor-pointer hover:bg-gray-100 py-2 text-gray-600 rounded-full"></div>
                                    </div>      
                                    </div>
                                </div> --}}

                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <div class="text-center justify-content-center form-group col-sm-12 flex-column d-flex">
                                                <input type="file" class="offset-md-4  form-control-file" name="imagen" id="imagen" value="{{ old('imagen') }}">
                                                <small id="imagen" class="text-muted">
                                                    En esta sección introduzca el archivo pdf solicitado.
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="py-3 col-md-12 justify-content-center text-center">
                                    <a href="{{route('perfil.atleta')}}" class="btn btn-negro ml-auto m-1">Cancelar</a>
                                    <button type="submit" class="btn btn-negro m-1">Actualizar</button>
                                </div>
                        </form>
                </div>
            </div>   
        </div>
    </div>
</body>
    
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
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
</script> 

@endsection          
