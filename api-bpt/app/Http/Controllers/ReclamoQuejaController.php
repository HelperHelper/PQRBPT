<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Queja; 
use App\Models\RespuestaQueja;
use App\Models\ReclamoQueja; 

class ReclamoQuejaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        echo "Accion de ReclamoQueja"; die();
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
   
           //Guardar el reclamo
           // generar numero aleatorio ->rand()
   
              $queja =  new Queja();
              $respuestaqueja = new RespuestaQueja();
              $recqueja = new ReclamoQueja();
   
              $recqueja->queja_id = $queja_id;
              $recqueja->nombre = $nombre;
              $recqueja->mensaje = $mensaje;
              $recqueja->numeroradicado = rand();
   
              //comprobar que la queja exista
   
              $isset_queja = Queja::where('id', '=', $queja_id)->first();

              // comprobar si existe respuesta a esa queja 
              $isset_respuestaQueja = RespuestaQueja::where('id', '=', $queja_id)->first();

              //comprobar que la queja tenga más de 5 días
            //   $fechapeticionesmayor = Peticion::whereDate('created_at', '=', Carbon::today()->toDateString());

             if(!$isset_queja){
   
               $data = array(
                   'status' => 'error',
                   'code' => 400,
                   'message' => 'No se puede registrar un reclamo ya que la queja no existe'
               );
   
             } else if($isset_respuestaQueja) {
   

                //echo($isset_respuestaQueja); die();
   
                    $recqueja->save();
        
                    $data = array(
                        'peticion' => $recqueja,
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
                'message' => 'No se puede registrar un reclamo ya que la queja no tiene
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
        $reclamoqueja = ReclamoQueja::find($id)->load('queja');
        return response()->json(array(
            'ReclamoQueja' => $reclamoqueja,
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
