<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ImagenResource extends JsonResource
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
            'tipo' => 'imagen',
            'id' => $this->resource->getRouteKey(),
            'atributos' => [
                'tipo' => $this->resource->tipo,
                'nombre' => $this->resource->nombre,
            ],
            'links' =>[
                'self' => route('usuario.imagen',$this->resource->imageneable_id),
            ]
        ];
    }
}
