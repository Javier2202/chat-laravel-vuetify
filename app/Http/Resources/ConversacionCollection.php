<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ConversacionCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => ConversacionResource::collection($this->collection),
            'links' => [
                'self' => route('conversacion.index')
            ],
            'meta' => [
                'numero_conversaciones' => $this->collection->count(),
            ]
        ];
    }
}
