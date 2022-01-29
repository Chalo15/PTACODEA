@extends('layouts.app')

@section('content')
<body class="seedata">

    <div class="container-fluid">
        <div class="row justify-content-center">
        <div class="col-sm-12 col-md-6 col-lg-6 p-1 m-3">
                <h2 class="display-5 text-center ">Registrar Datos de Sesión</h2>                
            </div>
        </div>

        <div class="pt-5">    

        <form class="form-horizontal row justify-content-center h5">
            @csrf
            @foreach ($users as $user)
            @endforeach


            
            <div class="form-group row">
                
                <label for="name" class="col-md-1 col-form-label text-md-right text-light">{{ __('Atleta ') }}</label>                
                <div class="col-md-3">
                    <input type="text" class="form-control" name="name" value="{{$users->name}}{{" "}}{{$users->lastname}}" required autocomplete="name" autofocus readonly>            
                </div>


                <label for="age" class="col-md-1 col-form-label text-md-right text-light">{{ __('Edad') }}</label>
                <div class="col-md-3">
                    
                    <?php 
                        $fch_actual  = new DateTime(date("Y-m-d"));
                        $fch_nac = new DateTime($users->birthdate);
                        $diferencia = $fch_actual->diff($fch_nac);
                    ?>

                    <input type="number" class="form-control" name="age" value="<?php echo $diferencia->y;?>" required autocomplete="age" autofocus readonly>
                </div>


  
                <label for="identification" class="col-md-1 col-form-label text-md-right text-light">{{ __('Cédula ') }}</label>
                <div class="col-md-3">
                    <input type="text" class="form-control" name="identification" value="{{ $users->identification }}" required autocomplete="identification" autofocus readonly>

                </div>
            </div>

            <div class="form-group row p-3">

                <label for="discipline" class="col-md-1 col-form-label text-md-right text-light">{{ __('Disciplina ') }}</label>
                <div class="col-md-3">
                    <input type="text" class="form-control" name="discipline" value="{{ $sports->description }}" required autocomplete="discipline" autofocus readonly>

                </div>
         


                <label for="phone" class="col-md-1 col-form-label text-md-right text-light">{{ __('Teléfono ') }}</label>
                <div class="col-md-3">
                    <input type="number" class="form-control" name="phone" value="{{ $users->phone }}" required autocomplete="phone" autofocus readonly>

                </div>
     

                <label for="date" class="col-md-1 col-form-label text-md-right text-light">{{ __('Fecha Sesión ') }}</label>
                 <div class="col-md-3">
                    <?php $fcha = date("Y-m-d");?>

                    <input type="date" class="form-control" name="date" value="<?php echo $fcha;?>" required autocomplete="date" autofocus readonly>              
                </div>
            </div>

            <div class="form-group row justify-content-center p-5">
                <textarea name="content" id="editor">   
                </textarea>
                <div class="col-md-12 text-center">
                    <p><input type="submit" value="Enviar" class="btn btn-negro ml-auto p-3 m-5"></p>

                </div>
            </div>
        </form>
    </div>

</body>
<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
        console.error(error);
        });
</script>


@endsection