@extends('layouts.app')

@section('content')


<body class="bodyHomePaige">

    <div class="homePaige container-fluid ">


    <!-- Vista del menu principal del Usuario Administrador -->

        @can('role',"Admin")
        
        <div class="Admin">

            <div class="row justify-content-center">
                <div class=" col-sm-12 col-md-6 col-lg-6 ">
                    <h2 class="py-5 display-5 text-center">Administrador</h2>
                </div>
            </div>

            <div class="row justify-content-center pt-3">
                <div class=" col-12 col-sm-2 col-md-2 col-lg-2 text-center aligne-item-center">
                    <div class="atleta_registro">
                        <h4 class="">Analizar Solicitud</h4>
                        <i class="d-block fas fa-running p-2"></i>
                        <button class="btn btn-negro" onclick= "window.location='{{ route('athlete_Res') }}'">Ingresar</button>
                    </div>
                </div>

                <div class="col-12 col-sm-2 col-md-2 col-lg-2 text-center aligne-item-center">
                    <div class="fisioterapia_clinica">
                        <h4 class="">Fisioterapia</h4>
                        <i class="d-block fas fa-user-md p-2"></i>
                        <button class="btn btn-negro">Ingresar</button>
                    </div>
                </div>

                <div class="col-12 col-sm-2 col-md-2 col-lg-2 text-center aligne-item-center">
                    <div class="gimnasio">
                        <h4 class="">Gimnasio</h4>
                        <i class=" d-block fas fa-dumbbell p-2"></i>
                        <button class="btn btn-negro">Ingresar</button>
                    </div>
                </div>

                <div class="col-12 col-sm-2 col-md-2 col-lg-2 text-center aligne-item-center">
                    <div class="mi_perfil">
                        <h4 class="">Mi Perfil</h4>
                        <i class="d-block fas fa-user p-2"></i>
                        <button onclick= "window.location='{{ route('perfil.atleta') }}'" class="btn btn-negro">Ingresar</button>
                    </div>
                </div>

                <div class="col-12 col-sm-2 col-md-2 col-lg-2 text-center aligne-item-center">
                    <div class="Registrar_funcionario">
                        <h4 class="">Registrar Funcionario</h4>
                        <i class="d-block fas fa-swimmer"></i>
                        <button class="btn btn-negro" onclick= "window.location='{{ route('funcionarios') }}'" class="btn btn-negro">Ingresar</button>
                    </div>
                </div>
                
            </div>

        </div>
        @endcan


    <!-- Vista del menu principal del Instructor -->

        @can('role',"Instructor")
        <div class="Instructor">

            <div class="row justify-content-center">
                <div class="col-sm-12 col-md-12 col-lg-12 ">
                    <h1 class="display-5 text-center py-5">Instructor</h1>
                </div>
            </div>
            <div class="row justify-content-center p-1">
                <div class="col-12 col-sm-4 col-md-4 col-lg-4 text-center aligne-item-center">
                    <div class="mi_perfil">
                        <h4 class="">Mi Perfil</h4>
                        <i class="d-block fas fa-user p-2"></i>
                        <button onclick= "window.location='{{ route('perfil.atleta') }}'" class="btn btn-negro">Ingresar</button>
                    </div>
                </div>
                <div class="col-12 col-sm-4 col-md-4 col-lg-4 text-center aligne-item-center">
                    <div class="registro_de_datos_atleta">
                        <h4 class="">Registrar datos del atleta</h4>
                        <i class="d-block fas fa-address-card p-2"></i>
                        <a href="/users/instructor"  class="btn btn-negro">Ingresar</a>
                    </div>
                </div>
                <div class="col-12 col-sm-4 col-md-4 col-lg-4 text-center aligne-item-center">
                    <div class="reservar_gimnasio">
                        <h4 class="">Reservar Instalaciones</h4>
                        <i class=" d-block fas fa-book p-2"></i>
                        <button onclick= "window.location='{{ Route('booking_form') }}'" class="btn btn-negro">Ingresar</button>
                    </div>
                </div>
            </div>

        </div>

        @endcan
        
        

    <!-- Vista del menu principal del Atleta -->
        @can('role',"Atleta")
        
        <div class="Atleta">
            <div class="row justify-content-center">
                <div class="col-sm-12 col-md-12 col-lg-12 ">
                    <h1 class="main_text_atleta text-center py-5">Atleta</h1>
                </div>
            </div>

            <div class="row justify-content-center p-1">

                <div class="col-12 col-sm-4 col-md-4 col-lg-4 text-center aligne-item-center">
                    <div class="reservar_gimnasio">
                        <h4 class="">Reservar Instalaciones</h4>
                        <i class=" d-block fas fa-book p-2"></i>
                        <button onclick= "window.location='{{ Route('booking_form') }}'" class="btn btn-negro">Ingresar</button>
                    </div>
                </div>

                <div class="col-12 col-sm-4 col-md-4 col-lg-4 text-center aligne-item-center">
                    <div class="mi_perfil">
                        <h4 class="">Mi Perfil</h4>
                        <i class="d-block fas fa-user-circle p-2"></i>
                        <button onclick= "window.location='{{ route('perfil.atleta') }}'" class="btn btn-negro">Ingresar</button>
                    </div>
                </div>

                <div class="col-12 col-sm-4 col-md-4 col-lg-4 text-center aligne-item-center">
                    <div class="expediente">
                        <h4 class="">Ver Expediente</h4>
                        <i class="d-block fas fa-id-card-alt p-2"></i>
                        <button class="btn btn-negro" onclick= "window.location='{{ url('/athletes/seedata') }}'">Ingresar</button>
                    </div>
                </div>
            </div>

        </div>
        
        @endcan


        
    <!-- Vista del menu principal de Fisioterapia -->
        @can('role',"Fisioterapia")
            
        <div class="Fisioterapia">
            <div class="row justify-content-center">
                <div class="col-sm-12 col-md-12 col-lg-12 ">
                    <h2 class="display-5 text-center py-5">Fisioterapia</h2>
                </div>
            </div>

            <div class="row justify-content-center p-1">

                <div class="col-12 col-sm-4 col-md-4 col-lg-4 text-center aligne-item-center">
                    <div class="mi_perfil">
                        <h4 class="">Mi Perfil</h4>
                        <i class="d-block fas fa-user-circle p-2"></i>
                        <button class="btn btn-negro">Ingresar</button>
                    </div>
                </div>

                <div class="col-12 col-sm-4 col-md-4 col-lg-4 text-center aligne-item-center">
                    <div class="expediente">
                        <h4 class="">Registrar datos de atleta</h4>
                        <i class="d-block fas fa-id-card-alt p-2"></i>
                        <button class="btn btn-negro" onclick= "window.location='{{ url('/physiotherapy/listAthletes') }}'">Ingresar</button>
                    </div>
                </div>
            </div>

        </div>
        
        
        @endcan

        <!-- Vista del menu principal de Musculacion -->
        @can('role',"Musculacion")
            
        <div class="Musculacion">
            <div class="row justify-content-center">
                <div class="col-sm-12 col-md-12 col-lg-12 ">
                    <h2 class="display-5 text-center py-5">Musculación</h2>
                </div>
            </div>

            <div class="row justify-content-center p-1">

                <div class="col-12 col-sm-4 col-md-4 col-lg-4 text-center aligne-item-center">
                    <div class="mi_perfil">
                        <h4 class="">Mi Perfil</h4>
                        <i class="d-block fas fa-user-circle p-2"></i>
                        <button class="btn btn-negro">Ingresar</button>
                    </div>
                </div>

                <div class="col-12 col-sm-4 col-md-4 col-lg-4 text-center aligne-item-center">
                    <div class="expediente">
                        <h4 class="">Registrar datos de atleta</h4>
                        <i class="d-block fas fa-id-card-alt p-2"></i>
                        <button class="btn btn-negro" onclick= "window.location='{{ url('/musculation/catalogAthletes') }}'">Ingresar</button>
                    </div>
                </div>
            </div>

        </div>
        
        
        @endcan

    </div> 

</body>

    @endsection
    