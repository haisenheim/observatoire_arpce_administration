<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DatacenterResource extends JsonResource
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
            'name'=>$this->name,
            'owner'=>$this->owner,
            'operateur'=>$this->operateur,
            'commune'=>$this->commune?$this->commune->name:'-',
            'start'=>$this->start?date_format($this->start,'d/m/Y'):'-'
        ];
    }
}
