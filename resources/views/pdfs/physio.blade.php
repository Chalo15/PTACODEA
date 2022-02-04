
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Informe de Sesion</title>
    <link rel="stylesheet" href="style.css" media="all" />

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

        body {
          position: relative;
          width: 19cm;  
          height: 29.7cm; 
          margin: 0 auto; 
          color: #001028;
          background: #FFFFFF; 
          font-family: Arial, sans-serif; 
          font-size: 12px; 
          font-family: Arial;
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

        table {
          width: 100%;
          border-collapse: collapse;
          border-spacing: 0;
          margin-bottom: 20px;
          font-size: 1.2em;
        }

        table tr:nth-child(2n-1) td {
          background: #F5F5F5;
        }

        table th,
        table td {
          text-align: center;
        }

        table th {
          padding: 5px 20px;
          color: #5D6975;
          border-bottom: 1px solid #C1CED9;
          white-space: nowrap;        
          font-weight: normal;
        }

        table .service,
        table .desc {
          text-align: left;
        }

        table td {
          padding: 20px;
          text-align: right;
        }

        table td.service,
        table td.desc {
          vertical-align: top;
        }

        table td.grand {
          border-top: 1px solid #5D6975;;
        }

        #notices {
          font-size: 1.3em;

        }
        #notices .notice {
          color: #5D6975;
        }

        footer {
          color: #5D6975;
          width: 100%;
          height: 30px;
          position: absolute;
          bottom: 0;
          border-top: 1px solid #EC7063;
          padding: 8px 0;
          text-align: center;
          font-size: 1.2em;
        }
    </style>
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="./img/1.png">
      </div>
      <h1>INFORME DE SESION</h1>
      <div id="company">

        @php
          setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
          $today = strftime("%d de %B del %Y"); 
        @endphp
        
        <div>CODEA ALAJUELA</div>
        <div>MONSERRAT, ALAJUELA, CR<br /> 20104</div>
        <div>(+506) 2442-1757</div>
        <div><a href="info@codea.go.cr">info@codea.go.cr</a></div>
        <div>{{ $today }}</div>
      </div>
      <div id="project">

        <div><span>Fecha Sesion</span> {{ $physio->date->isoFormat('LL') }}</div>
        <div><span>Fisioterapeuta</span> {{ $physio->user->full_name }}</div>
        <div><span>Correo</span> <a href="{{ $physio->user->email }}">{{ $physio->user->email }}</a></div>
        <div><span>Atleta</span> {{ $physio->athlete->user->full_name }}</div>
      </div>
    </header>
    <main>
      <table>
        <thead>
          <tr>
            <th class="service">RUBRO</th>
            <th class="desc">COMENTARIO</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="service">SPH</td>
            <td class="desc">{{ $physio->sph }}</td>
          </tr>
          <tr>
            <td class="service">APP</td>
            <td class="desc">{{ $physio->app }}</td>
          </tr>
          <tr>
            <td class="service">TRATAMIENTO</td>
            <td class="desc">{{ $physio->treatment }}</td>
          </tr>
          <tr>
            <td class="service">SUGERENCIAS</td>
            <td class="desc">{{ $physio->sugeries }}</td>
          </tr>
          <tr>
            <td class="service">FRACTURAS</td>
            <td class="desc">{{ $physio->fractures }}</td>
          </tr>
          <tr>
            <td class="service">GRADO DE SEVERIDAD</td>
            <td class="desc">{{ $physio->severity }}</td>
          </tr>
        </tbody>
      </table>
      <div id="notices">
        <div>Detalles adicionales:</div>
        <div class="notice">{!! $physio->details !!}</div>
      </div>
    </main>
    <footer>
      Siguenos en nuestras redes sociales y/o buscanos en www.codea.go.cr
    </footer>
  </body>
</html>
