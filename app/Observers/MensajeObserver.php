<?php

namespace App\Observers;

use App\Models\Conversacion;
use App\Models\Mensaje;

class MensajeObserver
{
    /**
     * Handle the mensaje "created" event.
     *
     * @param  \App\Models\Mensaje  $mensaje
     * @return void
     */
    public function created(Mensaje $mensaje)
    {
        /*$conversacion = Conversacion::
            where(function ($query) use ($mensaje){
                $query->where('de',auth()->id())->where('para',$mensaje->para);
            })
            ->orWhere(function($query) use ($mensaje){
                $query->where('de',$mensaje->para)->where('para',auth()->id());
            })
            ->update([
                'ultimo_mensaje' => $mensaje->contenido,
                'fecha_ultimo_mensaje' => $mensaje->$mensaje->created_at,
            ]);*/
    }

    /**
     * Handle the mensaje "updated" event.
     *
     * @param  \App\Models\Mensaje  $mensaje
     * @return void
     */
    public function updated(Mensaje $mensaje)
    {
        //
    }

    /**
     * Handle the mensaje "deleted" event.
     *
     * @param  \App\Models\Mensaje  $mensaje
     * @return void
     */
    public function deleted(Mensaje $mensaje)
    {
        //
    }

    /**
     * Handle the mensaje "restored" event.
     *
     * @param  \App\Models\Mensaje  $mensaje
     * @return void
     */
    public function restored(Mensaje $mensaje)
    {
        //
    }

    /**
     * Handle the mensaje "force deleted" event.
     *
     * @param  \App\Models\Mensaje  $mensaje
     * @return void
     */
    public function forceDeleted(Mensaje $mensaje)
    {
        //
    }
}
