<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class HousingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'photo'=>$this->photo,
            'address'=>$this->address,
            'description'=>$this->description,
        ];
    }
}
