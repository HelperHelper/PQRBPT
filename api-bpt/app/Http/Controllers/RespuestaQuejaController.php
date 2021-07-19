<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Queja; 
use App\Models\RespuestaQueja; 

class RespuestaQuejaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        echo "Accion de RespuestaQueja"; die();
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
         
         $queja_id = isset($params->queja_id) ? $params->queja_id : null;
         $nombre = isset($params->nombre) ? $params->nombre : null;
         $mensaje = isset($params->mensaje) ? $params->mensaje : null;
 
         //Guardar la respuesta
        // generar numero aleatorio ->rand()
 
            $queja =  new Queja();
            $resqueja = new RespuestaQueja();
 
            $resqueja->queja_id = $queja_id;
            $resqueja->nombre = $nombre;
            $resqueja->mensaje = $mensaje;
            $resqueja->numeroradicado = rand();
 
            //comprobar que la peticion exista
 
            $isset_queja = Queja::where('id', '=', $queja_id)->first();
           if(!$isset_queja){
 
             $data = array(
                 'status' => 'error',
                 'code' => 400,
                 'message' => 'No se puede registrar una respuesta ya que la Queja no existe'
             );
 
           } else {
 
 
            $resqueja->save();
 
            $data = array(
                'peticion' => $resqueja,
                'status' => 'success',
                'code' => 200, 
            );
 
         }
      
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
        //
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
