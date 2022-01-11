@extends('layouts.app')

@section('content')


<div class="text-center card-header">
<h1>Registro de sesión de entrenamiento</h1>
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
    {{__('Datos Adicionales del Atleta')}}

</button>
<script>
    ClassicEditor
    .create( document.querySelector( '#editor' ), {
        removePlugins: [ 'Heading', 'Link', 'InsertImage' ],
        toolbar: {
          items: [
              'heading', '|',
              'fontfamily', 'fontsize', '|',
              'alignment', '|',
              'fontColor', 'fontBackgroundColor', '|',
              'bold', 'italic', 'strikethrough', 'underline', 'subscript', 'superscript', '|',
              'link', '|',
              'outdent', 'indent', '|',
              'bulletedList', 'numberedList', 'todoList', '|',
              'code', 'codeBlock', '|',
              'insertTable', '|', 'blockQuote', '|',
              'undo', 'redo'
          ],
          shouldNotGroupWhenFull: true
        }
    } )
    .catch( error => {
        console.log( error );
    } );



@endsection