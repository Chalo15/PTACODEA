@extends('layouts.app')

@section('content')
<body class="athlete_request">

    <div class="container p-5">
        <div>
            <div class="row text-center justify-content-center">
                <div class="col-md-10 col-lg-10">
                    <h2 class="text-center">Seleccione el atleta de la sesión:</h2>
                    
                        <div class="table-responsive card-body">
                            <table border="5" class="table align-middle" style='font-size:160%'>
                                        
                                 <tbody>
                                    @foreach ($user as $athlete)
                                    <tr>
                                        <td><a href="{{ url ('musculation/report',[$athlete->id]) }}">{{$athlete->name}}{{" "}}{{$athlete->lastname}}</a></td>                                  
                                    </tr>                                      
                                    @endforeach
                                </tbody>
             
                            </table>
                        </div>
                </div>
            </div>
        </div>  
    </div>
    
</body>

@endsection