<?php

namespace App\Http\Controllers;

use App\Models\Bodega;
use Illuminate\Http\Request;

class BodegasController extends Controller
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

        return view ("bodegas.bodegas_index", ["bodegas"=>Bodega::all()]);  
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("bodegas.bodegas_create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $bodega = new Bodega($request->input());

        $v = \Validator::make($request->all(), [

            'codigo' => 'required|unique:bodegas',
            'nombre' => 'required',
            'numero_c' => 'required'
         ]);

        if ($v->fails())
        {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }
        
        $bodega->saveOrFail();
        return redirect()->route("bodegas.index")->with(["mensaje" => "creado",

        //($request->input());
    ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bodega  $bodega
     * @return \Illuminate\Http\Response
     */
    public function show(Bodega $bodega)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bodega  $bodega
     * @return \Illuminate\Http\Response
     */
    public function edit(Bodega $bodega)
    {

        return view("bodegas.bodegas_edit", ["bodega" => $bodega,]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bodega  $bodega
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bodega $bodega)
    {
        
        $v = \Validator::make($request->all(), [

            'codigo' => 'required',
            'nombre' => 'required',
            'numero_c' => 'required'
         ]);

        if ($v->fails())
        {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }

        $bodega->fill($request->input())->saveOrFail();
        return redirect()->route("bodegas.index")->with(["mensaje" => "producto actualizado"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bodega  $bodega
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bodega $bodega)
    {
        $bodega->delete();
        return redirect()->route("bodegas.index")->with(["mensaje" => "producto eliminado",
    ]); 
    }
}
