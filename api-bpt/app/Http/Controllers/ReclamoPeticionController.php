<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peticion;
use App\Models\RespuestaPeticion; 
use App\Models\ReclamoPeticion; 

class ReclamoPeticionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        echo "Accion de ReclamoPeticion"; die();
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
   
           //Guardar el reclamo
           // generar numero aleatorio ->rand()
   
              $peticion =  new Peticion();
              $respuestapeticion = new RespuestaPeticion();
              $recpeticion = new ReclamoPeticion();
   
              $recpeticion->peticion_id = $peticion_id;
              $recpeticion->nombre = $nombre;
              $recpeticion->mensaje = $mensaje;
              $recpeticion->numeroradicado = rand();
   
              //comprobar que la peticion exista
   
              $isset_peticcion = Peticion::where('id', '=', $peticion_id)->first();

              // comprobar si existe respuesta a esa peticion 
              $isset_respuestaPeticion = RespuestaPeticion::where('id', '=', $peticion_id)->first();

              //comprobar que la peticion tenga más de 5 días
            //   $fechapeticionesmayor = Peticion::whereDate('created_at', '=', Carbon::today()->toDateString());

             if(!$isset_peticcion){
   
               $data = array(
                   'status' => 'error',
                   'code' => 400,
                   'message' => 'No se puede registrar un reclamo ya que la peticion no existe'
               );
   
             } else if($isset_respuestaPeticion) {
   

                //echo($isset_respuestaPeticion); die();
   
                    $recpeticion->save();
        
                    $data = array(
                        'peticion' => $recpeticion,
                        'status' => 'success',
                        'code' => 200, 
                    );
   
        //    } else {


        //     //  echo($fechapeticionesmayor); die();
            
        //         // $recpeticion->save();
    
        //         // $data = array(
        //         //     'peticion' => $recpeticion,
        //         //     'status' => 'success',
        //         //     'code' => 200, 
        //         // );


          } else {

            $data = array(
                'status' => 'error',
                'code' => 400,
                'message' => 'No se puede registrar un reclamo ya que la peticion no tiene
                respuesta del area adminsitrativa o no tiene mas de 5 dias de su creacion'
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
        $reclamopeticion = Reclamopeticion::find($id)->load('peticion');
        return response()->json(array(
            'Reclamopeticion' => $reclamopeticion,
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
