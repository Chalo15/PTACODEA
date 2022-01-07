@extends('layouts.app')

@section('content')
<body class="seedata text-light">

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-6 col-lg-6 p-1 m-3">
                <h2 class="display-5 text-center">Registrar Datos de Sesión</h2>                
            </div>
        </div>

        <form class="form-horizontal row justify-content-center h5">
            @csrf
            
            <div class="form-group row">

                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre Completo') }}</label>

                <div class="col-md-7">
                    <input placeholder="Nombre" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">

                <label for="age" class="col-md-4 col-form-label text-md-right">{{ __('Edad') }}</label>

                <div class="col-md-7">
                    <input placeholder="Edad" type="number" pattern="[0-9]{2}" class="form-control @error('age') is-invalid @enderror" name="age" value="{{ old('age') }}" required autocomplete="age" autofocus>

                    @error('age')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">

                <label for="identification" class="col-md-4 col-form-label text-md-right">{{ __('Cédula') }}</label>

                <div class="col-md-7">
                    <input placeholder="Cédula" type="number" pattern="[0-9]{9}" class="form-control @error('identification') is-invalid @enderror" name="identification" value="{{ old('identification') }}" required autocomplete="identification" autofocus>

                    @error('identification')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">

                <label for="discipline" class="col-md-4 col-form-label text-md-right">{{ __('Disciplina') }}</label>

                <div class="col-md-7">
                    <input placeholder="Disciplina" type="text" class="form-control @error('discipline') is-invalid @enderror" name="discipline" value="{{ old('discipline') }}" required autocomplete="discipline" autofocus>

                    @error('discipline')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">

                <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Teléfono') }}</label>

                <div class="col-md-7">
                    <input placeholder="Teléfono" type="number" pattern="[0-9]{8}" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>

                    @error('telefono')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">

                <label for="date" class="col-md-4 col-form-label text-md-right">{{ __('Fecha de Sesión') }}</label>

                <div class="col-md-7">
                    <input placeholder="Fecha" type="date" class="form-control @error('date') is-invalid @enderror" name="date" value="{{ old('date') }}" required autocomplete="date" autofocus>

                    @error('date')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

        </form>

    </div>

</body>

@endsection