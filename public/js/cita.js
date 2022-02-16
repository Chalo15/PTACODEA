document.addEventListener('DOMContentLoaded', function() {

    let formulario = document.getElementById("form");
  
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

      axios.post("/checks/crear", datos).
      then(
          (respuesta)=>{
            $("#cita").modal("hide");
          }
        ).catch(
          error=>{
            if(error.response){
              console.log(error.response.data);
            }
          }
        )
    });

    
  
  });