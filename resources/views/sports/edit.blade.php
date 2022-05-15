<x-app-layout title="Editar Deporte">

    <div class="row">
        <div class="col mb-3">
            <a href="{{ route('sports.index') }}" class="btn btn-success">Atrás</a>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    Editar Deporte
                </div>

                <div class="card-body">
                    <h3 class="d-5">{{$sport->description}}</h3>
                    <div>
                        <form action="{{route('sports.update', $sport)}} " method="post">
                            @csrf
                            @method('put')

                            <x-editor name="content" value="{!! $sport->ckeditor !!}" />
                            <br>
                            <p><input type="submit" value="Enviar" class="btn btn-dark ml-auto m-1"></p>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

     
    @push('scripts')
    <script>


 $(document).ready(function(){


//Validaciones del formulario
    if($("#form_create_trainings").length > 0)
    {
        $('#form_create_trainings').validate({
        rules:{

        athlete_id: {
        required : true    
        },

        },

        messages : {
        athlete_id: {
        required : 'Por favor seleccione un atleta *'    
        },
        }
        });
    }
});

    </script>
    
@endpush

</x-app-layout>
