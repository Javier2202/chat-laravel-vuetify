<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conversacion extends Model
{
    protected $table = 'conversaciones';


    //relationships
    public function user()
    {
        return $this->belongsTo('App\User','de');
    }

    public function mensajes()
    {
        return $this->hasMany('App\Models\Mensaje');
    }
}
