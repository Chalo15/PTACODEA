@component('mail::message')
# Confirmacion de la cita de musculacion PTACODEA

Su cita para fisio terapia ha sido confirmada

# Table component:
@component('mail::table')
| Laravel | Table | Example |
| ------------- |:-------------:| --------:|
| Col 2 is | Centered | $10 |
| Col 3 is | Right-Aligned | $20 |
@endcomponent

@component('mail::button', ['url' => 'www.google.com'])
Ir al Portal de PTACODEA
@endcomponent

Thanks,<br>
Fisioterapia
@endcomponent