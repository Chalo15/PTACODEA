@extends('layouts.app')

@section('content')
<body class="athlete_data_session">

    @if(session('status'))
    <div class="alert alert-{{ session('status')['color'] }} alert-dismissible fade show" role="alert">
        {{ session('status')['mensaje'] }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif


    <div class="container py-4">

        <div class="row justify-content-center ">

            <div class="col-md-8">

                <div class="card">

                    <div class="text-center card-header">
                        <h3 class="d-5">Configuracion de toma de datos</h3>
                        <br>
                        <h3 class="d-5">{{$sport->description}}</h3>
                        <div>
                            <form action="{{route('ckeditor', $sport)}} " method="post">
                                @csrf
                                @method('put')

                                <textarea name="content" id="editor">

                            </textarea>
                                <br>
                                <p><input type="submit" value="Enviar" class="btn btn-negro ml-auto m-1"></p>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>
<script>
    ClassicEditor
        .create(document.querySelector('#editor'), {

            removePlugins: ['Heading', 'Link', 'InsertImage'],

            toolbar: ['bold', 'italic', 'bulletedList', 'numberedList', 'blockQuote']

        })

        .catch(error => {

            console.log(error);

        });

</script>
@endsection
