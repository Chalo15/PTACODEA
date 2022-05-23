@component('mail::message')
# Confirmacion de la cita de musculacion PTACODEA

<h2>Datos de la cita</h2>


@if($datos['State'] == 'CONFIRMADA')
<div class="text-center">
    <span class="text-center">Su solicitud de reserva ha sido aceptada</span>
</div>
@elseif($datos['State'] == 'PENDIENTE')
<div class="text-center">
    <span class="text-center">Su solicitud de reserva ha sido rechazada</span>
</div>
@endif


# Table component:
@component('mail::table')
| Atleta | Table | Example |
| ------------- |:-------------:| --------:|
| Col 2 is | Centered | $10 |
| Col 3 is | Right-Aligned | $20 |
@endcomponent



@component('mail::button', ['url' => 'wwww.google.com'])
Ir al Portal de PTACODEA
@endcomponent

Thanks,<br>
Musculacion
@endcomponent