@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-6 col-lg-6 p-1 m-3">
                <h2 class="display-5 text-center"><u>Información Personal</u></h2>
                
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
    
@endsection