@component('mail::message')
# Confirmacion de la cita de musculacion PTACODEA
<h2>Datos de la cita</h2>

@if($estado == 'CONFIRMADA')
<div class="text-center">
    <span class="text-center">Su solicitud de reserva ha sido aceptada</span>
</div>
@elseif($estado == 'PENDIENTE')
<div class="text-center">
    <span class="text-center">Su solicitud de reserva ha sido rechazada</span>
</div>
@endif



@component('mail::button', ['url' => 'wwww.google.com'])
Ir al Portal de PTACODEA
@endcomponent

Thanks,<br>
Musculacion
@endcomponent