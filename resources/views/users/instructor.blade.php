@extends('layouts.app')

@section('content')


<div class="text-center card-header">
<h1>Registro de sesion de entrenamiento</h1>
</div>
<x-row>
    <x-input name="fecha" placeholder="Fecha de entrenamiento" label="Fecha de entrenamiento" type="date" />
</x-row>

<form action="{{route('instructor.practica')}} " method="post">
    @csrf
    <textarea name="content" id="editor">
           
        </textarea>
    <p><input type="submit" value="Submit"></p>
</form>
<button   onclick="window.location='{{ route('athletes_index') }}'" class="btn btn-negro ml-auto m-1">
    {{__('Datos extra')}}

</button>
<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });



@endsection