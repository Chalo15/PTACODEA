<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Musculacion
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
                return  redirect('home');
                break;
            case('2'):
                return redirect('rutaInstructorInicio');
                break;
            case('3'):
                return redirect('rutaFuncionarioInicio');
                break;
            case('4'):
                return redirect('rutaAtletaInicio');
                break;
            case('5'):
               return redirect('rutaFisioterapiaInicio');
               break;
            case('6'):
               return $next($request);
               break;
            case('7'):
               return redirect('rutaUsExtInicio');
               break;
        }
    }
}
