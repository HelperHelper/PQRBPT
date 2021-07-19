<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Queja extends Model
{
    use HasFactory;

    protected $table = 'quejas';

    // public function reclamoqueja(){
    //     return $this->belongsTo('App\Models\ReclamoQueja', 'id');

    // }

    public function respuestaqueja(){
        return $this->belongsTo('App\Models\RespuestaQueja', 'id');

    }
}
