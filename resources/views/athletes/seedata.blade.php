@extends('layouts.app')

@section('content')
<body class="seedata text-light">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-6 col-lg-6 p-1 m-3">
                <h2 class="display-5 text-center"><u>Información de Contacto</u></h2>                
            </div>
        </div>
        
        <form class="form-horizontal row justify-content-center h5">           
            <div class="form-group ">
                <label class="col-lg-5 control-label font-weight-bold">Nombre:</label>
                <div class="col-lg-10">
                    <p class="form-control-static">{{ $us->name }}</p>
                </div>            
                <label class="col-lg-5 control-label font-weight-bold">Apellidos:</label>
                <div class="col-lg-10">
                    <p class="form-control-static">{{ $us->lastname}}</p>
                </div>                    
            </div>
            <div class="form-group ">
                <label class="col-lg-5 control-label font-weight-bold">Cédula:</label>
                <div class="col-lg-10">
                    <p class="form-control-static">{{ $us->identification }}</p>
                </div>               
                    <label class="col-lg-5 control-label font-weight-bold">Identificación de Rol:</label>
                    <div class="col-lg-10">
                        <p class="form-control-static">{{ $us->role_id }}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-5 control-label font-weight-bold">Teléfono:</label>
                    <div class="col-lg-10">
                        <p class="form-control-static">{{ $us->phone}}</p>
                    </div>
                    <label class="col-lg-5 control-label font-weight-bold">Fecha de nacimiento:</label>
                    <div class="col-lg-10">
                        <p class="form-control-static">{{ $us->birthdate}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-5 control-label font-weight-bold">Email:</label>
                    <div class="col-lg-10">
                        <p class="form-control-static">{{ $us->email}}</p>
                    </div>
                    <label class="col-lg-5 control-label font-weight-bold">Provincia:</label>
                    <div class="col-lg-10">
                        <p class="form-control-static">{{ $us->province}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-5 control-label font-weight-bold">Ciudad:</label>
                    <div class="col-lg-10">
                        <p class="form-control-static">{{ $us->city}}</p>
                    </div>
                    <label class="col-lg-5 control-label font-weight-bold">Dirección:</label>
                    <div class="col-lg-10">
                        <p class="form-control-static">{{ $us->address}}</p>
                    </div>
                </div>
            </div>    
            
        </form> 
            

        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-6 col-lg-6 p-1 m-3">
                <h2 class="display-5 text-center"><u>Información de Expediente</u></h2>                
            </div>
        </div>
        <form class="form-horizontal row justify-content-center h5">
            <div class="form-group">
                <label class="col-lg-5 control-label font-weight-bold">Género:</label>
                <div class="col-lg-10">
                    <p class="form-control-static">{{ $us->gender }}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-5 control-label font-weight-bold">Tipo de Sangre:</label>
                <div class="col-lg-10">
                    <p class="form-control-static">{{ $athlete->blood}}</p>
                </div>
            </div>
            <div class="form-group">
                    <label class="col-lg-5 control-label font-weight-bold">Identificación de Disciplina:</label>
                    <div class="col-lg-10">
                    <p class="form-control-static">{{ $athlete->sport_id}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-5 control-label font-weight-bold">Orientación de Juego:</label>
                    <div class="col-lg-10">
                    <p class="form-control-static">{{ $athlete->laterality }}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-5 control-label font-weight-bold">Cédula de Encargado(a):</label>
                    <div class="col-lg-10">
                        <p class="form-control-static">{{ $athlete->identification_manager }}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-5 control-label font-weight-bold">Nombre de Encargado(a):</label>
                    <div class="col-lg-10">
                        <p class="form-control-static">{{ $athlete->name_manager }}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-5 control-label font-weight-bold">Apellidos de Encargado(a):</label>
                    <div class="col-lg-10">
                        <p class="form-control-static">{{ $athlete->lastname_manager }}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-5 control-label font-weight-bold">Contacto de Encargado(a):</label>
                    <div class="col-lg-10">
                        <p class="form-control-static">{{ $athlete->contact_manager }}</p>
                    </div>
                </div>
            </form>  
    </div>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-6 col-lg-6 p-1 m-3">
                <h2 class="display-5 text-center"><u>Información de Expediente Detallada</u></h2>
                
            </div>
            <div class="col-md-8 col-form-label text-md-center p-1 m-4" >
                <h3><b>Nota:</b> Acá podés visualizar los apuntes que registraste en los últimos dos meses, por conceptos de musculación, fisioterapia y tu perfil.</h3>
            </div>            
        </div>
        
        <div class="row mt-3">
            <div class="col-md-12 col-sm-12">
                <x-row>
                    <label class="col-md-5 col-form-label text-md-right">Escoja una opcion: </label>
                    <div class="col-md-3 selectContainer justify-content-center text-center aligne-item-center">
                        <select name="asunto" placeholder="Visualizar" class="form-control" type="text" value="{{ old('asunto') }}">
                            <option value="0">Elegir</option>
                            <option value="mus">Musculación</option>
                            <option value="fis">Fisioterapia</option>
                            <option value="per">Mi perfil</option>
                        </select>
                    </div>
                </x-row>
                
                <x-row>
                    <label class="col-md-5 col-form-label text-md-right">Escoja una fecha: </label>
                    <div class="col-md-3 selectContainer justify-content-center text-center aligne-item-center">
                        <select name="asunto" placeholder="Visualizar" class="form-control" type="text" value="{{ old('asunto') }}">
                            <option value="0">Elegir</option>
                        </select>
                    </div>
                </x-row>
                
                <x-row>
                    <div class="offset-md-6 col-md-6 p-3">
                        <button class="btn btn-negro">Consultar</button>
                    </div>
                </x-row>
            </div>
            
        </div>
    </div>
    
</body>
    @endsection