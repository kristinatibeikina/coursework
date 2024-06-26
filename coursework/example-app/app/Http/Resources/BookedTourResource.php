<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookedTourResource extends JsonResource
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
            'count_children'=>$this->count_children,
            'count_adults'=>$this->count_adults,
            'wishes'=>$this->wishes,
            'response'=>$this->response,
            'tel'=>$this->tel,
            'email'=>$this->email,
            'date_application'=>$this->date_application,
            'price_end'=>$this->price_end,
            'id_tour'=>$this->id_tour,
        ];
    }
}
