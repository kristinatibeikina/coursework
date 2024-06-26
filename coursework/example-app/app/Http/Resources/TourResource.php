<?php

namespace App\Http\Resources;

use App\Models\Region;
use Illuminate\Http\Resources\Json\JsonResource;

class TourResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        if ($request->route()->getName() === 'index') {
            return [
                'id'=>$this->id,
                'name' => $this->name,
                'price' => $this->price,
                'date_start' => $this->date_start,
                'date_end' => $this->date_end,
                'photo' => asset('/storage/' . $this->photo),
            ];
        }
            return [
                'id'=>$this->id,
                'name'=>$this->name,
                'description'=>$this->description,
                'price'=>$this->price,
                'date_start'=>$this->date_start,
                'date_end'=>$this->date_end,
                'legal_age'=>$this->legal_age,
                'photo'=>$this->photo,
                'enabled'=>$this->enabled,
            ];

    }
}
