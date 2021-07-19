<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RespuestaQueja extends Model
{
    use HasFactory;

    protected $table = 'respuestaquejas';

    public function queja(){
        return $this->belongsTo('App\Models\Queja', 'queja_id');

    }
}
