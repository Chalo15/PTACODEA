document.addEventListener('DOMContentLoaded', function() {

    let formulario = document.querySelector("form")
  
    var calendarEl = document.getElementById('calendario');
  
    var calendar = new FullCalendar.Calendar(calendarEl, {
      initialView: 'timeGridDay',
      locale: "es",
  
      headerToolbar: {
        left: 'prev, next today',
        center: 'title',
        right: 'timeGridDay,timeGridWeek,listWeek'
      },
  
      dateClick:function(info){
        $("#cita").modal("show");
      }
  
    });
  
    calendar.render();
  
    document.getElementById("btnReserva").addEventListener("click", function(){
      const datos = new FormData(formulario);
  
      console.log(datos);

      axios.post("http://127.0.0.1:8000/checks/crear", datos).
      then(
          (respuesta)=>{
            $("#cita").modal("hide");
          }
        )
    });

    
  
  });