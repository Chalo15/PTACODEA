<x-app-layout title="Eventos">

    <head>
        <meta charset='utf-8' />
        <link href='fullcalendar/main.css' rel='stylesheet' />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.2/main.css">
        <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.2/main.js"></script>
        <script src='fullcalendar/main.js'></script>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                let form = document.querySelector("form");
                var calendarEl = document.getElementById('calendar');
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'dayGridMonth',
                    locale: "es",
                    headerToolbar: {
                        left: 'prev,next today',
                        center: 'title',
                        rigth: 'dayGridMonth,timeGridWeek,listWeek'
                    },
                    dateClick: function(info) {
                        $("#reservation").modal("show");
                    }
                });
                calendar.render();
                document.getElementById("btnSave").addEventListener("click", function(){
                    const data = new FormData(form)
                    console.log(data);
                });
            });
        </script>

        <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.2/locales-all.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.2/main.min.js"></script>
    </head>

    <body>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div id='calendar'></div>
                </div>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#reservation">
                    Launch
                </button>

                <!-- Modal -->
                <div class="modal fade" id="reservation" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
                    aria-hidden="true">
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
                                    <div class="form-group">
                                        <label for="id">ID</label>
                                        <input type="text" class="form-control" name="id" id="id" aria-describedby="helpId" placeholder="">
                                      </div>

                                    <div class="form-group">
                                      <label for="title">Titulo</label>
                                      <input type="text" class="form-control" name="title" id="title" aria-describedby="helpId" placeholder="">
                                    </div>

                                    <div class="form-group">
                                      <label for="description">Descripcion</label>
                                      <textarea class="form-control" name="description" id="description" rows="3"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="start">Inicio</label>
                                        <input type="text" class="form-control" name="start" id="start" aria-describedby="helpId" placeholder="">
                                      </div>

                                      <div class="form-group">
                                        <label for="end">Fin</label>
                                        <input type="text" class="form-control" name="end" id="end" aria-describedby="helpId" placeholder="">
                                      </div>
                                </form>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-success" id="btnSave">Guardar</button>
                                <button type="button" class="btn btn-warning" id="btnEdit">Modificar</button>
                                <button type="button" class="btn btn-danger" id="btnDelete">Eliminar</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</x-app-layout>
