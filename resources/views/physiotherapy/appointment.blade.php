@extends('layouts.app')

@section('content')
<body class="seedata text-light">

    <div class="container-fluid">
        <div class="row justify-content-center">
        <div class="col-sm-12 col-md-6 col-lg-6 p-1 m-3">
                <h2 class="display-5 text-center ">Registrar Datos de Sesión</h2>                
            </div>
        </div>

        <div class="pt-5">     

            <form class="form-horizontal row  justify-content-center h5">
                @csrf
                @foreach ($users as $user)
                @endforeach
                
                <div class="form-group row ">
                                        
                    <label for="name" class="col-md-1 col-form-label text-md-right">{{ __('Nombre Completo') }}</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$users->name}}{{" "}}{{$users->lastname}}" required autocomplete="name" autofocus readonly>
                        
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    
                    <label for="age" class="col-md-1 col-form-label text-md-right">{{ __('Edad') }}</label>
                    <div class="col-md-3">
                        
                        <?php 
                            $fch_actual  = new DateTime(date("Y-m-d"));
                            $fch_nac = new DateTime($users->birthdate);
                            $edad = $fch_actual->diff($fch_nac);
                            ?>

                        <input type="number" class="form-control @error('age') is-invalid @enderror" name="age" value="<?php echo $edad->y;?>" required autocomplete="age" autofocus readonly>

                        @error('age')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <label for="identification" class="col-md-1 col-form-label text-md-right">{{ __('Cédula') }}</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control @error('identification') is-invalid @enderror" name="identification" value="{{ $users->identification }}" required autocomplete="identification" autofocus readonly>

                        @error('identification')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
               

                <div class="form-group row ">

               <label for="discipline" class="col-md-1 col-form-label text-md-right">{{ __('Disciplina') }}</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control @error('discipline') is-invalid @enderror" name="discipline" value="{{ old('discipline') }}" required autocomplete="discipline" autofocus readonly>

                        @error('discipline')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <label for="phone" class="col-md-1 col-form-label text-md-right">{{ __('Teléfono') }}</label>  
                    <div class="col-md-3">
                        
                        <input type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $users->phone }}" required autocomplete="phone" autofocus readonly>

                        @error('telefono')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    
                    <label for="date" class="col-md-1 col-form-label text-md-right">{{ __('Fecha Sesión') }}</label>          
                    <div class="col-md-3">
                        <?php $fcha = date("Y-m-d");?>
                                        
                        <input type="date" class="form-control @error('date') is-invalid @enderror" name="date" value="<?php echo $fcha;?>" required autocomplete="date" autofocus readonly>

                        @error('date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

            </form>
        </div>
    </div>

</body>

@endsection