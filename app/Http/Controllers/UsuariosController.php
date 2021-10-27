<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        return view("usuarios.usuarios_index", ["usuarios"=>User::all()]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("usuarios.usuarios_create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         
        
        $v = \Validator::make($request->all(), [

            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'edad' => ['required'],
            'tipouser' => ['required'],
            'dinero' => ['required'],
         ]);

        if ($v->fails())
        {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }
        $contrasena = Hash::make($request->input('password'));

        $request->merge([
            'password' => $contrasena,
        ]);

        $usuario = new User($request->input()); 
 
        $usuario->saveOrFail();
        return redirect()->route("usuarios.index")->with(["mensaje" => "usuario creado",
    ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(User $usuario)
    {
       
       //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit(User $usuario)
    {
       
     return view("usuarios.usuarios_edit", ["usuario" => $usuario,]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $usuario)
    {
        $v = \Validator::make($request->all(), [

            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'edad' => ['required'],
            'tipouser' => ['required'],
            'dinero' => ['required'],
         ]);

        if ($v->fails())
        {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }
        /*
        $usuario->fill([
            'password' => Hash::make($request->password)
        ])->save();
        */
        
        $newPassword = Hash::make($request->password);
        
        $request->merge([
            'password' => $newPassword,
        ]);
        
        $usuario->fill($request->input())->saveOrFail();
        return redirect()->route("usuarios.index")->with(["mensaje" => "usuario actualizado"]); 
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $usuario)
    {
        $usuario->delete();
        return redirect()->route("usuarios.index")->with(["mensaje" => "usuario eliminado",
        ]);
    }
}
