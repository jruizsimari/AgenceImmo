<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PropertyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            $this->mergeWhen(false, [ // true, mettre des conditions si le user est un admin par exemple afficher ce champ
                'surface' => $this->surface
            ]),
//            'options' => OptionResource::collection($this->options), // lazy loading
            'options' => OptionResource::collection($this->whenLoaded('options')), // is not loaded from propertyController, add with() for eager loading
            'price' => $this->when(false, $this->price), // when est a false on supprime ce champs du retour
        ];
    }
}
