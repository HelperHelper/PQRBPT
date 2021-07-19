<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RespuestaPeticion extends Model
{
    use HasFactory;

    protected $table = 'respuestapeticiones';

    public function peticion(){
        return $this->belongsTo('App\Models\Peticion', 'peticion_id');


    }
}
