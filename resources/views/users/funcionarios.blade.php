@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="text-center card-header">
                    <h3 class="d-5">Formulario de registro de funcionario</h3>
                </div>
                <div class="card-body">
                    <form class="well form-horizontal" action="{{route('athletes.guardado')}} " method="post"  id="formulario_registro" enctype="multipart/form-data">
                    @csrf
                        <!--Nombre-->
                        <x-row>
                            <x-input name="nombre" placeholder="Nombre" label="Nombre"/>
                        </x-row>
                        <!--Apellido-->
                        <x-row>
                            <x-input name="apellidos" placeholder="Apellidos" label="Apellidos"/>
                        </x-row>
                        <!--Disciplina-->
                        <!--Telefono de habitacion-->
                        <x-row>
                            <x-input name="teleHabitacion" placeholder="Teléfono de habitación" label="Tel. Habitacion" type="number"/>
                        </x-row>
                        <!--Correo -->
                        <x-row>
                            <x-input name="correo" placeholder="Correo" label="Correo" type="email"/>
                        </x-row>
                        <!--Telefono Celular -->
                        <x-row>
                            <x-input name="telCelular" placeholder="Telefono Celular" label="Tel. Celular" type="number"/>
                        </x-row>
                        <!--Direccion (text-area) -->
                        <!--Fotocopia de la cedula (boton para adjuntar pdfs) -->
                        <!--Años de experiencia -->
                        <x-row>
                            <x-input name="experiencia" placeholder="Años de experiencia" label="Años de experiencia"/>
                        </x-row>
                        <!--Numero de contrato -->
                        <x-row>
                            <x-input name="numContrato" placeholder="Apellidos" label="Numero de Contrato"/>
                        </x-row>
                        <!--Periodo de ligamen con la institucion (meses de contrato) -->
                        <x-row>
                            <x-input name="contrato" placeholder="Periodo de ligamen con la institución" label="Periodo"/>
                        </x-row>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection