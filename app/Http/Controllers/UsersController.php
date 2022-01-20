<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use Illuminate\Http\Request;
use App\Models\Sport;
use App\Models\Role;
use App\Models\User;

class UsersController extends Controller
{
    /**
     * Cree una nueva instancia de controlador.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Mostrar una lista del recurso.
     *
     * @return \Illuminate\Http\Response
     */
    function index()
    {
        $users = User::with('role')->paginate(5);

        return view('users.index', compact('users'));
    }

    /**
     * Muestra el formulario para crear un nuevo recurso.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();

        $sports = Sport::all();

        return view('users.create', compact('roles', 'sports'));
    }

    /**
     * Almacene un recurso recién creado en el almacenamiento.
     *
     * @param  \App\Http\Requests\StoreUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $user = User::create($request->validated());

        if ($request->role_id == 2) {
            /**
             * Almacenaje de la imagen porque es un Coach
             *
             * Revisar código.
             */

            // if ($request->hasFile("archivo")) {
            //     $v_pdf = $request->file('archivo');
            //     $v_nombre = "pdf_" . time() . "." . $v_pdf->guessExtension();
            //     $url = public_path("storage/" . $v_nombre);
            //     if ($v_pdf->guessExtension() == "pdf") {
            //         copy($v_pdf, $url);
            //         $coach->url = $v_nombre;
            //     }
            // }

        } else if ($request->role_id == 3) {
            /**
             * Almacenaje en caso que sea funcionario.
             *
             * Revisar el código.
             */

            // $img=$request->file('imagen');
            // $imgseleccionada="prf_".time().".".$img->guessExtension();
            // $url=public_path("storage/imagenes/".$imgseleccionada);
            // if($img->guessExtension()=="jpeg"||$img->guessExtension()=="png"||$img->guessExtension()=="svg"||$img->guessExtension()=="jpg"){
            //     copy($img,$url);
            //     $usuario->photo=$imgseleccionada;
            // }
        }

        return redirect()->route('users.index');
    }

    /**
     * Mostrar el formulario para editar el recurso especificado.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Actualice el recurso especificado en el almacenamiento.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }
}
