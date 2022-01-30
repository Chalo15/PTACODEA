<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Documento Rutinario</title>

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
            height: 60px;

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

        #image {
            position: fixed;
            right: 20px;
            top: 20px;
            opacity: 0.1;
        }

        p {

            font-size: 120%;
            margin-left: 30px;
        }

    </style>
</head>

<body>
    <header>
        <div id="image">
            <img src="./img/1.png">

        </div>
        <div id="text">
            <h3>CODEA</h3>
            <h5>2442 1757</h5>

        </div>
        <div>
            @php
                $today = today()->toDateString();
            @endphp

            <p>{{ $today }}</p>
        </div>
    </header>

    <main>

        <div>
            <p><strong>Encargado de musculación:</strong> {{ $training->user->full_name }}</p><br>
            <p><strong>Nombre del Atleta:</strong> {{ $training->athlete->user->full_name }}</p><br>
            <p><strong>Fecha de Sesión:</strong> {{ $training->date }}</p><br>
            <p><strong>Edad:</strong> {{ $training->physiological_age }}</p><br>
            <p><strong>Peso Kg:</strong> {{ $training->weight }}</p><br>
            <p><strong>Altura Cm:</strong> {{ $training->height }}</p><br>
            <p><strong>IMC:</strong> {{ $training->bmi }}</p><br>
            <p><strong>Circ. Cintura Cm:</strong> {{ $training->waist }}</p><br>
            <p><strong>Circ. Cadera Cm:</strong> {{ $training->hip }}</p><br>
            <p><strong>Relacion Cintura Cadera</strong> {{ $training->cint_code }}</p><br>
            <p><strong>Tricipital</strong> {{ $training->tricipital }}</p><br>
            <p><strong>Subescapular</strong> {{ $training->subscapular }}</p><br>
            <p><strong>Abdominal:</strong> {{ $training->abdominal }}</p><br>
            <p><strong>Suprailiaco:</strong> {{ $training->suprailiac }}</p><br>
            <p><strong>Muslo:</strong> {{ $training->thigh }}</p><br>
            <p><strong>Pantorrilla:</strong> {{ $training->calf }}</p><br>
            <p><strong>Muñeca Cm:</strong> {{ $training->wrist }}</p><br>
            <p><strong>Codo Cm:</strong> {{ $training->elbow }}</p><br>
            <p><strong>Rodilla Cm:</strong> {{ $training->knee }}</p><br>
            <p><strong>Biceps Cm:</strong> {{ $training->biceps }}</p><br>
            <p><strong>Pantorrilla Cm:</strong> {{ $training->calf_cm }}</p><br>
            <p><strong>Biceps Cm:</strong> {{ $training->calories }}</p><br>
            <p><strong>IMC Alto:</strong> {{ $training->bmi_high }}</p><br>
            <p><strong>ICC Alto:</strong> {{ $training->icc_high }}</p><br>
            <p><strong>%Grasa:</strong> {{ $training->fat }}</p><br>
            <p><strong>%Residual:</strong> {{ $training->residual }}</p><br>
            <p><strong>%Óseo:</strong> {{ $training->bone }}</p><br>
            <p><strong>%Musculo:</strong> {{ $training->muscle }}</p><br>
            <p><strong>%Visceral:</strong> {{ $training->visceral }}</p><br>
            <p><strong>Peso Ideal Kg:</strong> {{ $training->ideal_weight }}</p><br>
            <p><strong>Aspectos por Mejorar:</strong> {{ $training->get_better }}</p><br>
            <p><strong>Detalles:</strong> {!! $training->details !!}</p><br>


        </div>
    </main>

    <footer>
        Copyright &copy; <?php echo date('Y'); ?>
    </footer>


</body>

</html>
