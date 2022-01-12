@extends('layouts.app')

@section('content')



<body class="booking_form_body">
    
    <div class="container-fluid">

        <div class="py-1 row justify-content-center">
            <div class="justify-content-center col-5 col-md-5">
                <button class="btn btn-negro"><i class="fas fa-arrow-left"></i></button>
            </div>
            <div class="text-right col-5 col-md-5">
                <button class="btn btn-negro"><i class="fas fa-arrow-right"></i></button>
            </div>
        </div>
        
        <div class="py-1 row justify-content-center">

            <div class="col-12 col-sm-12 col-md-12">

                <div class="card">

                    <div class="card-header text-center">
                        <h3 class="d-5">Reserva de Instalaciones</h3>
                    </div>

                    <div class="card-body">

                        <form action="">

                            <div class="form-group row">
                                
                                <div class="col-12 col-sm-4 col-md-4">
                                    <div class="col-12 col-md-12">
                                        <label class="mx-2 text-center">Nombre</label>
                                    </div>
                                    <div class="col-12 col-md-12">
                                        <input placeholder="Nombre" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    </div>
                                    
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    
                                </div>

                                <div class="col-12 col-sm-4 col-md-4">
                                    <div class="col-12 col-md-12">
                                        <label class="mx-2 text-center">Cédula</label>
                                    </div>
                                    <div class="col-12 col-md-12">
                                        <input placeholder="Cédula" type="number" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    </div>
                                    
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    
                                </div>

                                <div class="col-12 col-sm-4 col-md-4">
                                    <div class="col-12 col-md-12">
                                        <label class="mx-2 text-center">Edad</label>
                                    </div>
                                    <div class="col-md-12">
                                        <input placeholder="Edad" type="number" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    </div>
                                    
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    
                                </div>
                                
                            </div>

                            <div class="row justify-content-center">

                                <div class="col-12 col-sm-4 col-md-4">
                                    <div class="col-12 col-md-12">
                                        <label class="mx-2 text-center">Num. Teléfono</label>
                                    </div>
                                    <div class="col-12 col-md-12">
                                        <input placeholder="Número Telefónico" type="number" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    </div>
                                    
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    
                                </div>

                                <div class="col-12 col-sm-4 col-md-4">
                                    <div class="col-12 col-md-12">
                                        <label class="mx-2 text-center">E-mail</label>
                                    </div>
                                    <div class="col-12 col-md-12">
                                        <input placeholder="Número Telefónico" type="email" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    </div>
                                    
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    
                                </div>

                                <div class="col-12 col-sm-4 col-md-4">
                                    <div class="col-12 col-md-12">
                                        <label class="mx-2 text-center">Género</label>
                                    </div>
                                    <div class="col-12 col-md-12">
                                        
                                    </div>
                                    
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    
                                </div>
                            </div>
                            
                            <div class="mt-3 row justify-content-center">

                                <div class="ml-5 col-12 col-md-12">
                                    <button class="btn btn-negro">Registrar </button>
                                </div>
        
                            </div>

                        </form>
                            
                    </div>

                </div>

            </div>

        </div>

    </div>

</body>


@endsection