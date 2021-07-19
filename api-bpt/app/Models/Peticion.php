<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peticion extends Model
{
    use HasFactory;

    protected $table = 'peticiones';

    // public function reclamopeticion(){
    //     return $this->belongsTo('App\Models\ReclamoPeticion', 'id');

    // }

    public function respuestapeticion(){
        return $this->belongsTo('App\Models\RespuestaPeticion', 'id');

    }
    

}
