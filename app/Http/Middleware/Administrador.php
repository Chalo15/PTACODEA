<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Http\Request;

class Administrador
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        switch(auth::user()->id_role){
            case('1'):
                 return $next($request);
                 break;
             case('2'):
                 return redirect('rutaInstructorInicio');
                 break;
             case('3'):
                 return redirect('rutaFuncionarioInicio');
                 break;
             case('4'):
                 return redirect('rutaAtletasInicio');
                 break;
             case('5'):
                return redirect('rutaFisioterapiaInicio');
                break;
             case('6'):
                return redirect('rutaMusculacionInicio');
                break;
             case('7'):
                return redirect('rutaUsExtInicio');
                break;
            }
    }
}
