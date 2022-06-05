@component('mail::message')
# Confirmacion de la cita de musculacion PTACODEA


# Datos de la reservacion:
@component('mail::table')
| Estado | Fisioterapeuta | Fecha |
| ---------|:---------:| --------|
| <?php echo   $datos['State'] ?> | <?php echo $datos['Nombre_Encargado'] . " " . $datos['Apellidos_Encargado'] ?> | <?php echo $datos['Date'] ?> |
@endcomponent



@component('mail::button', ['url' => 'wwww.google.com'])
Ir al Portal de PTACODEA
@endcomponent

Thanks,<br>
Musculacion
@endcomponent