@component('mail::message')
# Confirmacion de la cita de musculacion PTACODEA

<h2>Datos de la cita</h2>


# Table component:
@component('mail::table')
| Atleta | Table | Example |
| ------------- |:-------------:| --------:|
| Col 2 is | Centered | $10 |
| Col 3 is | Right-Aligned | $20 |
@endcomponent


<div class="card-body">
    <div class="row">
        <div class="col">

            <x-table>
                <x-slot name="head">
                    <tr>
                        <th>Atleta</th>
                        <th>Encargado</th>
                        <th>Rol</th>
                        <th>Fecha</th>
                        <th>Hora Inicio</th>
                        <th>Hora Fin</th>
                        <th>Estado</th>
                    </tr>
                </x-slot>

                <x-slot name="body">
                    <tr class="text-center">
                        <td>$datos['Nombre_Atleta']</td>
                        <td><span>$datos['Nombre_Encargado']}} </span><span>$datos['Apellidos_Encargado']</span></td>
                        <td>$datos['Role_Encargado']</td>
                        <td>$datos['Date']->isoFormat('LL') </td>
                        <td> $datos['Start']->format('h:i A') </td>
                        <td> $datos['End']->format('h:i A')</td>

                        <td>
                            <span class=""> $datos['State']</span>
                        </td>
                    </tr>
                </x-slot>
                <x-slot name="foot">
                    <tr>
                        <th>Atleta</th>
                        <th>Encargado</th>
                        <th>Rol</th>
                        <th>Fecha</th>
                        <th>Hora Inicio</th>
                        <th>Hora Fin</th>
                        <th>Estado</th>
                    </tr>
                </x-slot>
            </x-table>

        </div>
    </div>
</div>
</div>
</div>
</div>



@component('mail::button', ['url' => 'wwww.google.com'])
Ir al Portal de PTACODEA
@endcomponent

Thanks,<br>
Musculacion
@endcomponent