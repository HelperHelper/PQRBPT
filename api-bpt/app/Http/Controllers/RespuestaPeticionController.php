<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peticion; 
use App\Models\RespuestaPeticion; 

class RespuestaPeticionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        echo "Accion de RespuestaPeticion"; die();
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
        
        $peticion_id = isset($params->peticion_id) ? $params->peticion_id : null;
        $nombre = isset($params->nombre) ? $params->nombre : null;
        $mensaje = isset($params->mensaje) ? $params->mensaje : null;

        //Guardar la respuesta
       // generar numero aleatorio ->rand()

           $peticion =  new Peticion();
           $respeticion = new RespuestaPeticion();

           $respeticion->peticion_id = $peticion_id;
           $respeticion->nombre = $nombre;
           $respeticion->mensaje = $mensaje;
           $respeticion->numeroradicado = rand();

           //comprobar que la peticion exista

           $isset_peticcion = Peticion::where('id', '=', $peticion_id)->first();
          if(!$isset_peticcion){

            $data = array(
                'status' => 'error',
                'code' => 400,
                'message' => 'No se puede registrar una respuesta ya que la peticion no existe'
            );

          } else {


           $respeticion->save();

           $data = array(
               'peticion' => $respeticion,
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
