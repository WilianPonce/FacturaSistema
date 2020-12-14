<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EmpresaResource extends JsonResource
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
            'type' => 'empresa',
            'id' => (string) $this->resource->getRouteKey(),
            'attributes' => [
                'ambiente' => $this->resource->ambiente,
                'razon_comercial' => $this->resource->razon_comercial,
                'ruc' => $this->resource->ruc,
                'direccion' => $this->resource->direccion,
                'direccion' => $this->resource->direccion,
                'created_at' => $this->resource->created_at
            ],
            'links' =>[
                'self' => route('empresa.show', $this->resource)
            ]
        ];
    }
}
