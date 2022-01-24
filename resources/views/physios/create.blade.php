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

                                                        {{-- Nombre --}}
                                                        <div class="form-group row">
                                                            <label for="nombre" class="col-sm-4 col-form-label">Nombre</label>
                                                            <div class="col-sm-8">
                                                                <x-input name="name" value="{{ old('name') }}" />
                                                            </div>
                                                        </div>

    </div>

    </div>
    </div>
</x-app-layout>
