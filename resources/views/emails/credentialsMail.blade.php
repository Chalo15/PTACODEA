@component('mail::message')

<div class="container">
    <h1 class="text-center">Su Regisistro se ha completado con exito</h1>
    <hr><br>
</div>
<div class="text-center">
    <h1 class="text-center">Datos</h1>
</div>

@component('mail::table')
| Usuario | Contraseña |
| ------------- |:-------------:|
<?php echo   $datos['Id'] ?> | <?php echo $datos['Password'] ?>
@endcomponent

@component('mail::button', ['url' => 'www.google.com'])
Ir al Portal de PTACODEA
@endcomponent



<footer>
    Síguenos en nuestras redes sociales y/o buscanos en www.codea.go.cr
</footer>
@endcomponent