<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UsuarioResource extends JsonResource
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
            'tipo' => 'user',
            'id' => $this->resource->getRouteKey(),
            'atributos' => [
                'nombre' => $this->resource->name,
                'email' => $this->resource->email,
            ],
            'links' =>[
                'self' => route('usuario.show',$this->resource),
            ]
        ];
    }
}
