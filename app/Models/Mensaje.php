<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mensaje extends Model
{
    protected $table = 'mensajes';

    protected $attributes = [
        'estado' => 'Enviado',
    ];

    //relationships
    public function conversacion()
    {
        return $this->belongsTo('App\Models\Conversacion');
    }
}
