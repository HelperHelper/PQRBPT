<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peticion;
use App\Models\RespuestaPeticion;

class PeticionController extends Controller
{
    public function index()
    {
        echo "Accion Registro Peticion"; die();
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

         //Guardar la peticion
        // generar numero aleatorio ->rand()

            $peticion = new Peticion();
            $peticion->nombre = $nombre;
            $peticion->mensaje = $mensaje;
            $peticion->numeroradicado = rand();

            $peticion->save();

            $data = array(
                'peticion' => $peticion,
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
        $peticion = Peticion::find($id)->load('respuestapeticion');
        return response()->json(array(
            'Peticion' => $peticion,
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
