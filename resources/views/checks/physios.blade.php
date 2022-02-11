<x-app-layout title="Citas Fisioterapia">

    <div class="row">
        <div class="col mb-3">
            <a href="{{ route('home') }}" class="btn btn-primary">
                <i class="fas fa-reply"></i> &nbsp;
                Atrás
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="container">
                    <div id="calendario">
                        
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modelId">
      Reserva
    </button>
    
    <!-- Modal -->
    <div class="modal fade" id="cita" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    <form action="">
                        {!! csrf_field() !!}

                        <div class="form-group">
                          <label for="title">Motivo</label>
                          <input type="text" class="form-control" name="title" id="title" aria-describedby="helpId" placeholder="Escribe el motivo de la cita">
                          <small id="helpId" class="form-text text-muted">Campo obligatorio</small>
                        </div>

                        <div class="form-group">
                          <label for="start">Inicio</label>
                          <input type="date" class="form-control" name="start" id="start" aria-describedby="helpId" placeholder="Elige una hora">
                          <small id="helpId" class="form-text text-muted">Campo Obligatorio</small>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" id="btnReserva">Reservar</button>
                    <button type="button" class="btn btn-danger" id="btnEliminar">Eliminar</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>