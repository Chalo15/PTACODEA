@extends('layouts.app')

@section('content')


<div class="text-center card-header">
    <h1>Registro de sesión de entrenamiento</h1>
    <div>
        <x-row>
            <x-input name="fecha" placeholder="Fecha de entrenamiento" label="Fecha de entrenamiento" type="date" />
        </x-row>
        <div>

            <form action="{{route('instructor.practica')}} " method="post">
                @csrf
                <div> <textarea name="content" id="editor">
                    {{$sport->ckeditor}}
                    </textarea></div>
                <div><br>
                    <p><input type="submit" value="Enviar" class="btn btn-negro ml-auto m-1"></p>
                </div>

            </form>
            <button onclick="window.location='{{ route('athletes_index') }}'" class="btn btn-negro ml-auto m-1">
                {{__('Datos Adicionales del Atleta')}}

            </button>
        </div>
    </div>

</div>


<script>
    ClassicEditor
        .create(document.querySelector('#editor'), {

            removePlugins: ['Heading', 'Link', 'InsertImage'],

            toolbar: ['bold', 'italic', 'bulletedList', 'numberedList', 'blockQuote']

        })

        .catch(error => {

            console.log(error);

        });


    @endsection
