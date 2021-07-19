<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Queja; 

class QuejaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        echo "Accion de Queja"; die();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          //Recoger datos por post
          $json = $request->input('json', null);
          $params = json_decode($json);
          
          $nombre = isset($params->nombre) ? $params->nombre : null;
          $mensaje = isset($params->mensaje) ? $params->mensaje : null;
 
          //Guardar la Queja
         // generar numero aleatorio ->rand()
 
             $queja = new Queja();
             $queja->nombre = $nombre;
             $queja->mensaje = $mensaje;
             $queja->numeroradicado = rand();
 
             $queja->save();
 
             $data = array(
                 'peticion' => $queja,
                 'status' => 'success',
                 'code' => 200, 
             );
       
        return response()->json($data, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $queja = Queja::find($id)->load('respuestaqueja');
        return response()->json(array(
            'Queja' => $queja,
            'Status' => 'success'

        ), 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
