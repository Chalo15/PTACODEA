<x-app-layout title="Crear Documento">

    <div class="row">
        <div class="col mb-3">
            <a href="{{ route('users.index') }}" class="btn btn-primary">
                <i class="fas fa-arrow-left"></i> &nbsp;
                Atrás
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    Crear Documento
                </div>

                <div class="card-body">
                    <form action="{{ route('physios.store') }}" method="POST">
                        @csrf

                                <!--'athletes', 'user'-->
                                {{-- Atleta --}}
                                <div class="form-group row">
                                    <label for="athlete" class="col-sm-4 col-form-label">Usuario</label>
                                    <div class="col-sm-8">
                                        <x-select name="athlete">
                                            <option disabled {{ old('user_id') ? '' : 'selected' }} value=""> -- Seleccione -- </option>
                                            @foreach ($athletes as $athlete)
                                            <option {{ old('user_id') == $athlete->user->id ? 'selected' : '' }} value="{{ $athlete->user->id }}">{{ $athlete->user->identification . ' | ' . $athlete->user->name . " " . $athlete->user->last_name }}</option>
                                            @endforeach
                                        </x-select>
                                    </div>
                                </div>

                       

                </div>

            </div>
        </div>
</x-app-layout>
