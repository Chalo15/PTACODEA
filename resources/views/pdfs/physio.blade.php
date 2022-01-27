<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Documento Rutinario</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <style>
      /** Define the margins of your page **/
      @page {
          margin: 100px 25px;
      }

      header {
          position: fixed;
          top: -80px;
          left: -40px;
          right: -40px;
          height: 80px;

          /** Extra personal styles **/
          background-color: #212529;
          color: white;
          text-align: center;
          line-height: 35px;
      }

      footer {
          position: fixed; 
          bottom: -60px; 
          left: 0px; 
          right: 0px;
          height: 50px; 

          /** Extra personal styles **/
          background-color: #212529;
          color: white;
          text-align: center;
          line-height: 35px;
      }
    </style>
  </head>
<body>
  <header>
    <h2>Polideportivo Monserrat</h2>
  </header>
  
  <main>

    <div >
      <p><strong>Fisioterapeuta:</strong> {{ $physio->user->full_name }}</p><br>
      <p><strong>Nombre del Atleta:</strong> {{ $physio->athlete->user->full_name }}</p><br>
      <p><strong>Fecha de Sesión:</strong> {{ $physio->date }}</p><br>
      <p><strong>SPH:</strong> {{ $physio->sph }}</p><br>
      <p><strong>APP:</strong> {{ $physio->app }}</p><br>
      <p><strong>Tratamiento:</strong> {{ $physio->treatment }}</p><br>
      <p><strong>Sugerencias:</strong> {{ $physio->sugeries }}</p><br>
      <p><strong>Fracturas:</strong> {{ $physio->fractures }}</p><br>
      <p><strong>Numero de Sesion:</strong> {{ $physio->count_session }}</p><br>
      <p><strong>Grado de Severidad:</strong> {{ $physio->severity }}</p><br>
      <p><strong>Detalles:</strong> {!! $physio->details !!}</p><br>
      
    </div>
  </main>

  <footer>
    Copyright &copy; <?php echo date("Y");?> 
  </footer>

    
</body>
</html>