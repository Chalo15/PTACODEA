<link rel="stylesheet" href="style.css" media="all" />

<style>
    #logo {
        text-align: center;
        margin-bottom: 10px;
    }

    #logo img {
        width: 90px;
    }

    .mensaje {
        text-align: center;
    }

    #project {
        float: left;
    }

    #project span {
        color: #5D6975;
        text-align: left;
        width: 55px;
        margin-right: 60px;
        display: inline-block;
    }

    #company {
        float: right;
    }

    #company span {
        color: #5D6975;
        text-align: right;
        width: 52px;
        margin-right: 10px;
        display: inline-block;
    }

    #project div,
    #company div {
        white-space: nowrap;
        font-size: 1.3em;
        margin-top: 4px;
    }

    .headMessage {
        text-align: center;
    }

    span {
        text-align: center;
    }
</style>

@component('mail::message')

<div id="logo">
    <img src="./img/1.png">
</div>
<div>
    <hr>
    <h1 class="mensaje">Confirmación de cita en Fisioterapia</h1>
    <hr>


<div class="container">

@php

    setlocale(LC_ALL, 'es_ES@euro', 'es_ES', 'esp');

    $today = strftime('%d de %B del %Y');

@endphp

<h2 class="mensaje">
<div>CODEA ALAJUELA</div>
<div>DIRECCIÓN : MONSERRAT, ALAJUELA, CR</div>
<div>CODIGO POSTAL : 20104</div>
<div>TELÉFONO : (+506) 2442-1757 </div>
<div>CORREO CONTACTO : <a href="info@codea.go.cr">info@codea.go.cr</a></div>
<div>FECHA : {{ $today }}</div>

</h2>
</div>
</div>

<hr>
<div class="mensaje">
    <h1 class="mensaje">Datos de la cita</h1>
</div>
<hr>
@component('mail::table')
| Estado | Fisioterapeuta | Fecha |
| ---------|:---------:| --------|
| <p class="mensaje"><?php echo   $datos['State'] ?></p> | <p class="mensaje"><?php echo $datos['Nombre_Encargado'] . " " . $datos['Apellidos_Encargado'] ?></p> | <p class="mensaje"><?php echo $datos['Date'] ?></p> |
@endcomponent



@component('mail::button', ['url' => 'https://www.codea.go.cr/'])
Ir al Portal de PTACODEA
@endcomponent

<div class="container">
<div>NO CONTESTAR A ESTE CORREO</div><br>
<div>Síguenos en nuestras redes sociales y/o buscanos en <a href="https://www.codea.go.cr/" target="_blank">www.codea.go.cr</a></div>
</div>
@endcomponent
