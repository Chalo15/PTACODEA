<x-app-layout title="Cambio de foto">

    <div class="row row justify-content-center pt-3">
        <div class="col-md-8">
            <div class="card">
                <div class="py-3 text-center card-header">
                    <h3>Seleccionar foto de perfil</h3>
                </div>

                <form class="well form-horizontal" action="{{route('savePhoto')}} " method="post" id="formulario_foto_perfil" enctype="multipart/form-data">
                    @csrf
                    <!--foto de perfil-->

                    <div class="text-center">
                        <img class="rounded" id="seleccionada" style="max-height: 300px;">
                    </div>



                    {{-- <input class="text-sm cursor-pointer w-36 hidden"  type="file" name="imagen" id="imagen" >  --}}

                    <div class="card">
                        <div class="card-body">
                            <div class="form-group row">


                                <div class="mb-3 text-center justify-content-center form-group col-sm-12 ">
                                    <input class="form-control" type="file" name="imagen" id="imagen" value="{{ old('imagen') }}">
                                </div>

                            </div>
                        </div>
                    </div>






                    <div class="py-3 col-md-12 justify-content-center text-center">
                        <a href="{{route('perfil.atleta')}}" class="btn btn-negro ml-auto m-1">Cancelar</a>
                        <button type="submit" class="btn btn-negro m-1">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function(e) {
            $('#imagen').change(function() {
                let reader = new FileReader();
                reader.onload = (e) => {
                    $('#seleccionada').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            });
        });

    </script>
    @endpush

</x-app-layout>
