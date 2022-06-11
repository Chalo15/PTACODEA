<style>
    .clearfix:after {
      content: "";
      display: table;
      clear: both;
    }

    a {
      color: #5D6975;
      text-decoration: underline;
    }

    header {
      padding: 10px 0;
      margin-bottom: 30px;
    }

    #logo {
      text-align: center;
      margin-bottom: 10px;
    }

    #logo img {
      width: 90px;
    }

    h1 {
      border-top: 1px solid  #5D6975;
      border-bottom: 1px solid  #5D6975;
      color: #5D6975;
      font-size: 2.4em;
      line-height: 1.4em;
      font-weight: normal;
      text-align: center;
      margin: 0 0 20px 0;
      background: url(dimension.png);
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
  </style>
@component('mail::message')

<div id="logo">
    <img src="./img/1.png">
  </div>
<div class="container">
    <h1 class="text-center">Actualizacion de credenciales<br>
    No responda este mensaje
    </h1>
    <h2>
    @php
    setlocale(LC_ALL, 'es_ES@euro', 'es_ES', 'esp');
    $today = strftime('%d de %B del %Y');
@endphp

<div id="logo">CODEA ALAJUELA</div>
<div>DIRECCIÓN : MONSERRAT, ALAJUELA, CR</div>
<div>CODIGO POSTAL : 20104</div>
<div>TELÉFONO : (+506) 2442-1757 </div>
<div>CORREO CONTACTO : <a href="info@codea.go.cr">info@codea.go.cr</a></div>
<div>FECHA : {{ $today }}</div>
</h2>
</div>
<h1 class="text-center">Datos</h1>

@component('mail::table')
| Usuario | Nueva Contraseña |
| ------------- |:-------------:|
<?php echo   $datos['Id'] ?> | <?php echo $datos['Password'] ?>
@endcomponent

@component('mail::button', ['url' => 'www.google.com'])
Ir al Portal de PTACODEA
@endcomponent

<div class="container">
    <div>Síguenos en nuestras redes sociales y/o buscanos en <a href="https://www.codea.go.cr/" target="_blank">www.codea.go.cr</a></div>
</div>
@endcomponent
