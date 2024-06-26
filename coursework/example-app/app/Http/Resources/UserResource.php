<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        return[
            'id'=>$this->id,
            'surname'=>$this->surname,
            'name'=>$this->name,
            'patronymic'=>$this->patronymic,
            'email'=>$this->email,
            'email_verified_at'=>$this->email_verified_at
        ];
    }
}
