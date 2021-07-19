<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReclamoQueja extends Model
{
    use HasFactory;

    protected $table = 'reclamoquejas';

    public function queja(){
        return $this->belongsTo('App\Models\Queja', 'queja_id');

    }
}
