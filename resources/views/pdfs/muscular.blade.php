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
    <p><strong>Encargado de musculación:</strong> {{ $muscular->user->full_name }}</p><br>
    <p><strong>Nombre del Atleta:</strong> {{ $muscular->athlete->user->full_name }}</p><br>
    <p><strong>Fecha de Sesión:</strong> {{ $muscular->date }}</p><br>
    <p><strong>Edad:</strong> {{ $muscular->physiological_age }}</p><br>
      <p><strong>Peso Kg:</strong> {{ $muscular->weight }}</p><br>
      <p><strong>Altura Cm:</strong> {{ $muscular->height }}</p><br>
      <p><strong>IMC:</strong> {{ $muscular->bmi }}</p><br>
      <p><strong>Circ. Cintura Cm:</strong> {{ $muscular->waist }}</p><br>
      <p><strong>Circ. Cadera Cm:</strong> {{ $muscular->hip }}</p><br>
      <p><strong>Relacion Cintura Cadera</strong> {{ $muscular->cint_code }}</p><br>
      <p><strong>Tricipital</strong> {{ $muscular->tricipital }}</p><br>
      <p><strong>Subescapular</strong> {{ $muscular->subscapular }}</p><br>
      <p><strong>Abdominal:</strong> {{ $muscular->abdominal }}</p><br>
      <p><strong>Suprailiaco:</strong> {{ $muscular->suprailiac }}</p><br>
      <p><strong>Muslo:</strong> {{ $muscular->thigh }}</p><br>
      <p><strong>Pantorrilla:</strong> {{ $muscular->calf }}</p><br>
      <p><strong>Muñeca Cm:</strong> {{ $muscular->wrist }}</p><br>
      <p><strong>Codo Cm:</strong> {{ $muscular->elbow }}</p><br>
      <p><strong>Rodilla Cm:</strong> {{ $muscular->knee }}</p><br>
      <p><strong>Biceps Cm:</strong> {{ $muscular->biceps }}</p><br>
      <p><strong>Pantorrilla Cm:</strong> {{ $muscular->calf_cm }}</p><br>
      <p><strong>Biceps Cm:</strong> {{ $muscular->calories }}</p><br>
      <p><strong>IMC Alto:</strong> {{ $muscular->bmi_high }}</p><br>
      <p><strong>ICC Alto:</strong> {{ $muscular->icc_high }}</p><br>
      <p><strong>%Grasa:</strong> {{ $muscular->fat }}</p><br>
      <p><strong>%Residual:</strong> {{ $muscular->residual }}</p><br>
      <p><strong>%Óseo:</strong> {{ $muscular->bone }}</p><br>
      <p><strong>%Musculo:</strong> {{ $muscular->muscle }}</p><br>
      <p><strong>%Visceral:</strong> {{ $muscular->visceral }}</p><br>
      <p><strong>Peso Ideal Kg:</strong> {{ $muscular->ideal_weight }}</p><br>
      <p><strong>Aspectos por Mejorar:</strong> {{ $muscular->get_better }}</p><br>
      <p><strong>Detalles:</strong> {!! $muscular->details !!}</p><br>
    

    </div>
  </main>

  <footer>
    Copyright &copy; <?php echo date("Y");?> 
  </footer>

    
</body>
</html>