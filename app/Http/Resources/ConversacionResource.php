<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ConversacionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'tipo' => 'conversacion',
            'id' => $this->resource->getRouteKey(),
            'atributos' => [
                'de' => $this->resource->de,
                'para' => $this->resource->para,
                'ultimo_mensaje' => $this->resource->ultimo_mensaje,
                'fecha_ultimo_mensaje' => $this->resource->fecha_ultimo_mensaje,
                'notificaciones' => $this->resource->notificaciones,
                'bloqueado' => $this->resource->bloqueado,
            ],
            'relationships' =>[
                'de' => UsuarioResource::make($this->resource->user_de),
                'para' => UsuarioResource::make($this->resource->user_para),
            ],
            'links' =>[
                'self' => route('conversacion.show',$this->resource),
            ]
        ];
    }
}
